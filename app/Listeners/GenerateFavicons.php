<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Statamic\Events\GlobalSetSaved;
use Statamic\Globals\GlobalSet;

class GenerateFavicons implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(GlobalSetSaved $event)
    {
        if ($event->globals->handle() !== 'favicons' || !GlobalSet::findByHandle('favicons')->in('default')->get('use')) {
            return;
        }

        $svg = GlobalSet::findByHandle('favicons')->in('default')->get('svg');
        $iOSBackground = GlobalSet::findByHandle('favicons')->in('default')->get('ios_color');

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