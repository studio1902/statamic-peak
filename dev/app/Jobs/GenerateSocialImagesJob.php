<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;
use Statamic\Facades\AssetContainer;

class GenerateSocialImagesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $items;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->items->each(function($item, $key) {

            $disk = AssetContainer::find('social_images')->disk();

            // Delete any old images remaining.
            collect([
                $disk->path($item->get('og_image')),
                $disk->path($item->get('twitter_image')),
            ])->each(function ($image) {
                if (File::exists($image))
                    File::delete($image);
            });

            // Prepare.
            $id = $item->id();
            $title = Str::of($item->get('title'))->slug('-');
            $absolute_url = $item->site()->absoluteUrl();
            $unique = time();

            // Generate, save and set default og image.
            $file = "{$title}-og-{$unique}.png";
            $image = Browsershot::url("{$absolute_url}/social-images/{$id}")
                ->windowSize(1200, 630)
                ->select('#og')
                ->save($disk->path($file));
            $item->set('og_image', $file)->save();

            // Generate, save and set default twitter image.
            $file = "{$title}-twitter-{$unique}.png";
            $image = Browsershot::url("{$absolute_url}/social-images/{$id}")
                ->windowSize(1200, 600)
                ->select('#twitter')
                ->save($disk->path($file));
            $item->set('twitter_image', $file)->save();
        });

        Artisan::call('cache:clear');
    }
}
