<?php

namespace App\Actions;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
use Statamic\Actions\Action;
use Statamic\Contracts\Entries\Entry as EntryInstance;
use Statamic\Facades\Entry;
use Statamic\Globals\GlobalSet;

class GenerateSocialImages extends Action implements ShouldQueue
{
    public $available_collections = array();

    public function __construct() {
        if (GlobalSet::findByHandle('seo')->inDefaultSite()->get('use_social_image_generation') && GlobalSet::findByHandle('seo')->inDefaultSite()->get('social_images_collections')) {
            $this->available_collections = GlobalSet::findByHandle('seo')->inDefaultSite()->get('social_images_collections');
        }
    }
    
    /**
     * Determine if the current thing is an entry and if it's opted in to the auto generation config (global).
     *
     * @return boolean
     */
    public function visibleTo($item)
    {
        return $item instanceof EntryInstance && in_array($item->collectionHandle(), $this->available_collections);
    }
    
    /**
     * Determine if the current user is allowed to run this action.
     *
     * @return boolean
     */
    public function authorize($user, $item)
    {
        return $user->can('edit', $item);
    }
    
     /**
     * Run the action
     *
     * @return void
     */
    public function run($items, $values)
    {
        $items->each(function($item, $key) {
            $id = $item->id();
            $title = Str::of($item->get('title'))->slug('-');
            $app_url = config('app.url');
            
            // Generate, save and set default og image.
            $file = "{$title}-og.png";
            $image = Browsershot::url("{$app_url}/social-images/{$id}")
                ->windowSize(1200, 630)
                ->select('#og')
                ->save("social_images/{$file}");
            $item->set('og_image', $file)->save();
            
            // Generate, save and set default twitter image.
            $file = "{$title}-twitter.png";
            $image = Browsershot::url("{$app_url}/social-images/{$id}")
                ->windowSize(1200, 600)
                ->select('#twitter')
                ->save("social_images/{$file}");
            $item->set('twitter_image', $file)->save();
        });
    }
}
