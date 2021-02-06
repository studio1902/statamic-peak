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
        $background = GlobalSet::findByHandle('favicons')->in('default')->get('ios_color');

        $this->createThumbnail('favicons/' . $svg, public_path('favicons/apple-touch-icon.png'), 180, 180, $background, 15);
        $this->createThumbnail('favicons/' . $svg, public_path('favicons/android-chrome-512x512.png'), 512, 512, 'transparent', false);

        Artisan::call('cache:clear');
    }

    private function createThumbnail($import, $export, $width, $height, $background, $border)
    {
        try {
            $im = new \Imagick();
            $im->setResolution($width, $height);
            $im->setGravity(\imagick::GRAVITY_CENTER);
            $im->setBackgroundColor(new \ImagickPixel($background));
            $svgdata = $this->squareViewbox(file_get_contents($import), $width, $height);
            $im->readImageBlob($svgdata);
            if ($border)
                $im->borderImage($background, $border, $border);
            $im->resizeImage($width, $height, \imagick::FILTER_LANCZOS, 1);
            $im->setImageFormat('png32');
            file_put_contents($export, $im->getImageBlob());
            $im->clear();
            $im->destroy();
            return true;
        }
        catch(Exception $e) {
            return false;
        }
    }

    private function squareViewbox($svg, $width, $height)
    {
        $svgObj = simplexml_load_string($svg);
        $svgObj['width'] = $width . 'px';
        $svgObj['height'] = $height . 'px';
        $viewBox = explode(' ', $svgObj['viewBox']);
        $viewBoxWidth = $viewBox[2];
        $viewBoxHeight = $viewBox[3];
        // $min = min($viewBoxWidth, $viewBoxHeight);
        $max = max($viewBoxWidth, $viewBoxHeight);
        // $translate = ($max - $min) / 2;
        $svgObj['viewBox'] = '0 0 ' . $max . ' ' . $max;
        // if (isset($svgObj->g)) {
        //     $viewBoxWidth < $viewBoxHeight 
        //         ? $svgObj->g->addAttribute('transform', "translate(${translate}, 0)") 
        //         : $svgObj->g->addAttribute('transform', "translate(0, ${translate})");
        // }
        return $svgObj->asXML();
    }
}
