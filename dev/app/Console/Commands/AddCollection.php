<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Facades\Entry;

class AddCollection extends Command
{
    use RunsInPlease;

    /**
    * The name of the console command.
    *
    * @var string
    */
    protected $name = 'peak:add-collection';

     /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Add a collection.";

     /**
     * The collection name.
     *
     * @var string
     */
    protected $collection_name = '';

    /**
     * The collection filename.
     *
     * @var string
     */
    protected $filename = '';

    /**
     * Public.
     *
     * @var bool
     */
    protected $public = true;

     /**
     * The collection route.
     *
     * @var string
     */
    protected $route = '';

    /**
     * The layout
     *
     * @var string
     */
    protected $layout = '';

    /**
     * Revisions.
     *
     * @var bool
     */
    protected $revisions = false;

    /**
     * Dated collection.
     *
     * @var bool
     */
    protected $dated = false;

    /**
     * Sort direction.
     *
     * @var string
     */
    protected $sort_dir = '';

    /**
     * Date behavior past
     *
     * @var string
     */
    protected $date_past = 'public';

    /**
     * Date behavior future
     *
     * @var string
     */
    protected $date_future = 'private';

    /**
     * Show template.
     *
     * @var string
     */
    protected $template = '';

    /**
     * Mount.
     *
     * @var string
     */
    protected $mount = '';

    /**
     * Index template.
     *
     * @var bool
     */
    protected $index = true;

     /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $this->collection_name = $this->ask('What should be the name for this collection?');
        $this->filename = Str::slug($this->collection_name, '_');
        $this->public = ($this->confirm('Should this be a public collection with a route?', true)) ? true : false;
        if ($this->public) {
            $this->route = $this->ask('What should be the route for this collection?', '/{mount}/{url}');
            $choice = $this->choice('On which page do you want to mount this collection?', $this->getPages());
            preg_match('/\[(.*?)\]/', $choice, $id);
            $this->mount = $id[1];
        }
        $this->layout = $this->ask('What should be the layout file for this collection?', 'layout');
        $this->revisions = ($this->confirm('Should revisions be enabled?', false)) ? true : false;
        $this->sort_dir = ($this->confirm('Should the sort direction be ascending?', true)) ? 'asc' : 'desc';
        $this->dated = ($this->confirm('Should this be a dated collection?', false)) ? true : false;
        if ($this->dated) {
            $this->date_past = $this->ask('What should be the date behavior for entries in the past?', 'public');
            $this->date_future = $this->ask('What should be the date behavior for entries in the future?', 'private');
        }
        $this->index = ($this->confirm('Generate and apply index template?', true)) ? true : false;
        $this->show = ($this->confirm('Generate and apply show template?', true)) ? true : false;

        try {
            $this->createCollection();
            $this->createDirectory("resources/blueprints/collections/{$this->filename}");
            $this->createBlueprint();
            if ($this->index || $this->show) $this->createDirectory("resources/views/{$this->filename}");
            if ($this->index) $this->createIndexTemplate();
            if ($this->show) $this->createShowTemplate();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        // $this->createPartial();

        $this->info("Collection '{$this->name}' created.");
    }

    /**
     * Check if a file doesn't already exist.
     *
     * @return bool|null
     */
    protected function checkExistence($type, $path)
    {
        if (File::exists(base_path($path))) {
            throw new \Exception("$type '{$path}' already exists.");
        }
    }

    /**
     * Get all pages.
     *
     * @return array
     */
    protected function getPages()
    {
        $query = Entry::query()
            ->where('collection', 'pages')
            ->where('status', 'published')
            ->orderBy('title', 'asc');

        return $query->get()->map(fn($entry) =>
               "{$entry->get('title')} [{$entry->id()}]"
            )
            ->toArray();
    }

    /**
     * Create fieldset.
     *
     * @return bool|null
     */
    protected function createCollection()
    {
        $this->checkExistence('Collection', "content/collections/{$this->filename}.yaml");

        $stub = File::get(__DIR__.'/stubs/collection.yaml.stub');
        $contents = Str::of($stub)
            ->replace('{{ collection_name }}', $this->collection_name)
            ->replace('{{ route }}', $this->route)
            ->replace('{{ layout }}', $this->layout)
            ->replace('{{ revisions }}', ($this->revisions) ? 'true' : 'false')
            ->replace('{{ sort_dir }}', $this->sort_dir)
            ->replace('{{ dated }}', ($this->dated) ? 'true' : 'false')
            ->replace('{{ date_past }}', $this->date_past)
            ->replace('{{ date_future }}', $this->date_future)
            ->replace('{{ template }}', $this->show ? "{$this->filename}/show" : 'default' )
            ->replace('{{ mount }}', $this->mount);

        File::put(base_path("content/collections/{$this->filename}.yaml"), $contents);
    }

    /**
     * Create blueprints.
     *
     * @return bool|null
     */
    protected function createBlueprint()
    {
        $this->checkExistence('Blueprint', "resources/blueprints/collections/{$this->filename}/{$this->filename}.yaml");

        $stub = ($this->public)
            ? ($this->dated
                ? '/stubs/collection_blueprint_public_dated.yaml.stub'
                : '/stubs/collection_blueprint_public.yaml.stub')
            : ($this->dated
                ? '/stubs/collection_blueprint_public_dated.yaml.stub'
                : '/stubs/collection_blueprint_public.yaml.stub');

        $stub = File::get(__DIR__.$stub);
        $contents = Str::of($stub)
            ->replace('{{ collection_name }}', $this->collection_name);

        File::put(base_path("resources/blueprints/collections/{$this->filename}/{$this->filename}.yaml"), $contents);
    }

    /**
     * Create dir.
     *
     * @return bool|null
     */
    protected function createDirectory($directory)
    {
        File::makeDirectory($directory);
    }

    /**
     * Create index template.
     *
     * @return bool|null
     */
    protected function createIndexTemplate()
    {
        $this->checkExistence('Template', "resources/views/{$this->filename}/_index.antlers.html");

        $stub = File::get(__DIR__.'/stubs/index.antlers.html.stub');
        $contents = Str::of($stub)
            ->replace('{{ collection_name }}', $this->collection_name)
            ->replace('{{ handle }}', $this->filename);

        File::put(base_path("resources/views/{$this->filename}/_index.antlers.html"), $contents);
    }

    /**
     * Create index template.
     *
     * @return bool|null
     */
    protected function createShowTemplate()
    {
        $this->checkExistence('Template', "resources/views/{$this->filename}/_show.antlers.html");

        $stub = File::get(__DIR__.'/stubs/show.antlers.html.stub');
        $contents = Str::of($stub)
            ->replace('{{ collection_name }}', $this->collection_name);

        File::put(base_path("resources/views/{$this->filename}/_show.antlers.html"), $contents);
    }
}
// 1. DONE Input: name handle route blueprint index show
// 2. Collection.yaml generated from input variables
// 3. DONE Mount collection, show list of pages
// 4. DONE Add route with default ‘/{mount}/{slug}’
// 5. DONE Blueprint from default stub with section headers, page builder
// 6. DONE Generate index from stub
// 7. DONE Generate show from stub
// 9. Apply template to mounted page
