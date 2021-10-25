<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Facades\Entry;
use Statamic\Facades\GlobalSet;

class ClearSite extends Command
{
    use RunsInPlease;

    /**
    * The name of the console command.
    *
    * @var string
    */
    protected $name = 'peak:clear-site';

     /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Clear all default Peak content.";

     /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $clear_site = ($this->confirm('Are you sure you want to clear all default Peak content?', true)) ? true : false;

        if ($clear_site) {
            $this->trashAssets();
            $this->clearGlobalSocialMedia();
            $this->clearPageBuilder('/');
            $this->trashPagesButHome();

            Artisan::call('statamic:glide:clear');
            Artisan::call('cache:clear');

            $this->info("Your view from the peak is clear.");
        }
    }

    /**
     * Trash all assets.
     *
     * @return bool|null
     */
    protected function trashAssets()
    {
        $files = new Filesystem;
        $path = public_path('assets');
        if ($files->exists($path))
            $files->cleanDirectory($path);
    }

     /**
     * Trash global social media data.
     *
     * @return bool|null
     */
    protected function clearGlobalSocialMedia()
    {
        $set = GlobalSet::findByHandle('social_media');
        $set->inDefaultSite()->set('social_media', null)->save();
    }

    /**
     * Clear the page builder.
     *
     * @return bool|null
     */
    protected function clearPageBuilder($uri)
    {
        Entry::findByUri($uri)
            ->set('page_builder', null)
            ->save();
    }

    /**
     * Trash all pages but home.
     *
     * @return bool|null
     */
    protected function trashPagesButHome()
    {
        $pages = Entry::query()
            ->where('collection', 'pages')
            ->where('id', '!=', 'home')
            ->get();

        foreach ($pages as $page) {
            $file_path = base_path("content/collections/pages/{$page->slug()}.md");
            if (File::exists($file_path))
                File::delete($file_path);
        }
    }
}
