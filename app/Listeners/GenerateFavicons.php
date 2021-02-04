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
            $icon = GlobalSet::findByHandle('favicons')->in('default')->get('svg');
            $im = new \Imagick();

            // TODO: Dynamicify
            $svg = file_get_contents('assets/' . $icon);

            // TODO: squarify SVG

            $im->readImageBlob($svg);
            $im->setImageFormat("png24");

            // TODO: multiple versions
            // TODO: background color
            // TODO: padding
            $im->resizeImage(180, 180, \imagick::FILTER_LANCZOS, 1);  

            $im->writeImage(public_path('touch_icon.png'));
            $im->clear();
            $im->destroy();
        }
    }
}
