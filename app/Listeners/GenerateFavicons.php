<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
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
        if ($event->globals->handle() === 'favicons') {
            $svg = GlobalSet::findByHandle('favicons')->in('default')->get('svg');
            $background = GlobalSet::findByHandle('favicons')->in('default')->get('ios_color');

            $this->createThumbnail('favicons/' . $svg, public_path('favicons/apple-touch-icon.png'), 180, 180, $background, 15);
            $this->createThumbnail('favicons/' . $svg, public_path('favicons/android-chrome-512x512.png'), 512, 512, 'transparent', false);
        }
    }

    private function createThumbnail($import, $export, $width, $height, $background, $border)
    {
        try {
            $im = new \Imagick();
            $im->setBackgroundColor(new \ImagickPixel($background));

            $svgdata = file_get_contents($import);
            $svgdata = $this->svgScaleHack($svgdata, $width, $height);

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

    private function svgScaleHack($svg, $minWidth, $minHeight)
    {
        $reW = '/(.*<svg[^>]* width=")([\d.]+px)(.*)/si';
        $reH = '/(.*<svg[^>]* height=")([\d.]+px)(.*)/si';
        preg_match($reW, $svg, $mw);
        preg_match($reH, $svg, $mh);
        $width = floatval($mw[2]);
        $height = floatval($mh[2]);
        if (!$width || !$height) return false;

        // scale to make width and height big enough
        $scale = 1;
        if ($width < $minWidth)
            $scale = $minWidth/$width;
        if ($height < $minHeight)
            $scale = max($scale, ($minHeight/$height));

        $width *= $scale*2;
        $height *= $scale*2;

        $svg = preg_replace($reW, "\${1}{$width}px\${3}", $svg);
        $svg = preg_replace($reH, "\${1}{$height}px\${3}", $svg);

        return $svg;
    }
}
