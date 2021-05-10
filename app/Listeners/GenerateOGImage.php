<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use mikehaertl\wkhtmlto\Image;
use Statamic\Facades\Entry;
use Statamic\Events\EntrySaved;

class GenerateOGImage implements ShouldQueue
{
     /**
     * Handle the event.
     *
     * @param EntrySaved $event
     * @return void
     */
    public function handle(EntrySaved $event)
    {
        $id = $event->entry->id();
        $entry = Entry::find($id);

        if ($entry->get('og_render_image') == true) {
            
            $image = new Image("/og_images/{$id}.png");
            $image->setOptions([
                'width' => 1200,
                'height' => 630,
                'quality' => 10,
                // 'load-error-handling' => 'ignore',
            ]);

            $image->saveAs('/public/test.png');
            
            // $entry->set('og_image', $file)->set('og_render_image', false)->save();
        }
    }
}
