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

            $container = AssetContainer::find('social_images');
            $disk = $container->disk();

            // Delete any old images/meta remaining.
            collect([
                $item->get('og_image'),
                $item->get('twitter_image'),
            ])
            ->filter()
            ->each(function ($image) use ($container) {
                if($container->asset($image)->exists()){
                    $container->asset($image)->delete();
                }
            });

            // Prepare.
            $id = $item->id();
            $title = Str::of($item->get('title'))->slug('-');
            $absolute_url = $item->site()->absoluteUrl();
            $unique = time();

            // Generate, save and set default og image/meta.
            $file = "{$title}-og-{$unique}.png";
            $image = Browsershot::url("{$absolute_url}/social-images/{$id}")
                ->windowSize(1200, 630)
                ->select('#og')
                ->save($disk->path($file));
            $container->makeAsset($file)->save();
            $item->set('og_image', $file)->save();

            // Generate, save and set default twitter image/meta.
            $file = "{$title}-twitter-{$unique}.png";
            $image = Browsershot::url("{$absolute_url}/social-images/{$id}")
                ->windowSize(1200, 600)
                ->select('#twitter')
                ->save($disk->path($file));
            $container->makeAsset($file)->save();
            $item->set('twitter_image', $file)->save();
        });

        Artisan::call('cache:clear');
    }
}
