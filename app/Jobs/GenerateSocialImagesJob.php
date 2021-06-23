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
use Spatie\Browsershot\Browsershot;

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
            $id = $item->id();
            $title = Str::of($item->get('title'))->slug('-');
            $app_url = config('app.url');

            // Generate, save and set default og image.
            $file = "{$title}-og.png";
            $image = Browsershot::url("{$app_url}/social-images/{$id}")
                ->windowSize(1200, 630)
                ->select('#og')
                ->save(public_path("social_images/{$file}"));
            $item->set('og_image', $file)->save();

            // Generate, save and set default twitter image.
            $file = "{$title}-twitter.png";
            $image = Browsershot::url("{$app_url}/social-images/{$id}")
                ->windowSize(1200, 600)
                ->select('#twitter')
                ->save(public_path("social_images/{$file}"));
            $item->set('twitter_image', $file)->save();
        });

        Artisan::call('cache:clear');
    }
}
