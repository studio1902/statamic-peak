<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Facades\Entry;
use Statamic\Facades\GlobalSet;
use Statamic\Support\Arr;
use Symfony\Component\Yaml\Yaml;

class ClearSite extends Command
{
    use RunsInPlease;

    /**
    * The name of the console command.
    *
    * @var string
    */
    protected $name = 'statamic:peak:clear-site';

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
        $clear_site = ($this->confirm('Do you want to clear all default Peak content?', false)) ? true : false;

        if ($clear_site) {
            $this->trashAssets();
            $this->clearGlobalSocialMedia();
            $this->clearHomePage();
            $this->trashPagesButHomeAnd404();
            $this->clearNavigation();

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
     * Clear the home page.
     *
     * @return bool|null
     */
    protected function clearHomePage()
    {
        // Note: we can't use Entry::query()->save() when running from the PostInstallHook.
        $stub = File::get(__DIR__.'/stubs/home.md.stub');
        File::put(base_path('content/collections/pages/home.md'), $stub);
    }

    /**
     * Trash all pages but home.
     *
     * @return bool|null
     */
    protected function trashPagesButHomeAnd404()
    {
        $pages = Entry::query()
            ->where('collection', 'pages')
            ->where('id', '!=', 'home')
            ->where('title', '!=', 'Page not found')
            ->get();

        foreach ($pages as $page) {
            $file_path = base_path("content/collections/pages/{$page->slug()}.md");
            if (File::exists($file_path))
                File::delete($file_path);
        }
    }

    /**
     * Clear navigation.
     *
     * @return bool|null
     */
    protected function clearNavigation()
    {
        $navigation = Yaml::parseFile(base_path('content/trees/navigation/main.yaml'));
        $tree = Arr::get($navigation, 'tree');
        unset($tree[1]);
        Arr::set($navigation, 'tree', $tree);

        File::put(base_path('content/trees/navigation/main.yaml'), Yaml::dump($navigation, 99, 2));
    }
}
