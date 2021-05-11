<?php

namespace App\Actions;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
use Statamic\Actions\Action;
use Statamic\Facades\Entry;
use Statamic\Contracts\Entries\Entry as EntryInstance;

class GenerateSocialImages extends Action implements ShouldQueue
{
    public $available_collections = array('pages');

    public function visibleTo($item)
    {
        return $item instanceof EntryInstance && in_array($item->collectionHandle(), $this->available_collections);
    }

    public function authorize($user, $item)
    {
        return $user->can('edit', $item);
    }

    public function run($items, $values)
    {
        $items->each(function($item, $key) {
            $id = $item->id();
            $title = Str::of($item->get('title'))->slug('-');
            $app_url = config('app.url');
            
            $file = "{$title}-og.png";
            $image = Browsershot::url("{$app_url}/social-images/{$id}")
                ->windowSize(1200, 630)
                ->select('#og')
                ->save(public_path($file));
    
            $file = "{$title}-twitter.png";
            $image = Browsershot::url("{$app_url}/social-images/{$id}")
                ->windowSize(1200, 600)
                ->select('#twitter')
                ->save(public_path($file));
        });
    }
}
