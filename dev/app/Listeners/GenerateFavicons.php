<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Artisan;
use Statamic\Events\GlobalSetSaved;
use Statamic\Globals\GlobalSet;

class GenerateFavicons
{
    /**
     * Determine whether this event should be handled.
     *
     * @param GlobalSet $globals
     * @return bool
     */
    private function shouldHandle(GlobalSet $globals): bool
    {
        return $globals->handle() === 'browser_appearance'
            && $globals->inDefaultSite()->get('use_favicons');
    }

    /**
     * Handle the event.
     *
     * @param GlobalSetSaved $event
     * @return void
     */
    public function handle(GlobalSetSaved $event)
    {
        /** @var GlobalSet $globals */
        $globals = $event->globals;

        if (!$this->shouldHandle($globals)) {
            return;
        }

        $svg = $globals->inDefaultSite()->get('svg');
        $iOSBackground = $globals->inDefaultSite()->get('ios_color');

        $this->createThumbnail('favicons/' . $svg, 'favicons/apple-touch-icon.png', 180, 180, $iOSBackground, 15);
        $this->createThumbnail('favicons/' . $svg, 'favicons/android-chrome-512x512.png', 512, 512, 'transparent', false);

        Artisan::call('cache:clear');
    }

    private function createThumbnail($import, $export, $width, $height, $background, $border)
    {
        $svg = file_get_contents($import);
        $svgObj = simplexml_load_string($svg);
        $viewBox = explode(' ', $svgObj['viewBox']);
        $viewBoxWidth = $viewBox[2];
        $viewBoxHeight = $viewBox[3];
        if ($viewBoxWidth >= $viewBoxHeight) {
            $ratio = $width / $viewBoxWidth;
        } else {
            $ratio = $height / $viewBoxHeight;
        }

        $im = new \Imagick();
        $im->setResolution($viewBoxWidth * $ratio * 2, $viewBoxHeight * $ratio * 2);
        $im->setBackgroundColor(new \ImagickPixel($background));
        $im->readImageBlob($svg);
        $im->resizeImage($viewBoxWidth * $ratio, $viewBoxHeight * $ratio, \imagick::FILTER_LANCZOS, 1);

        if ($viewBoxWidth >= $viewBoxHeight) {
            $compensateHeight = $height - ($viewBoxHeight * $ratio);
            $im->extentImage($width, $height - $compensateHeight / 2, 0, $compensateHeight * -.5);
            $im->extentImage($width, $height, 0, 0);
        } else {
            $compensateWidth = $width - ($viewBoxWidth * $ratio);
            $im->extentImage($width - $compensateWidth / 2, $height, $compensateWidth * -.5, 0);
            $im->extentImage($width, $height, 0, 0);
        }

        if ($border) {
            $im->borderImage($background, $border, $border);
            $im->resizeImage($width, $height, \imagick::FILTER_LANCZOS, 1);
        }

        $im->setImageFormat('png32');
        file_put_contents($export, $im->getImageBlob());
        $im->clear();
        $im->destroy();
    }
}
