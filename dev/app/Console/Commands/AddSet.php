<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Facades\Config;
use Statamic\Support\Arr;
use Stringy\StaticStringy as Stringy;
use Symfony\Component\Yaml\Yaml;

class AddSet extends Command
{
    use RunsInPlease;

    /**
    * The name of the console command.
    *
    * @var string
    */
    protected $name = 'peak:add-set';

     /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Add an Article (Bard) set.";

     /**
     * The set name.
     *
     * @var string
     */
    protected $set_name = '';

     /**
     * The set filename.
     *
     * @var string
     */
    protected $filename = '';

     /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $this->set_name = $this->ask('What should be the name for this set?');
        $this->filename = Stringy::slugify($this->set_name, '_', Config::getShortLocale());

        try {
            $this->checkExistence('Fieldset', "resources/fieldsets/{$this->filename}.yaml");
            $this->checkExistence('Partial', "resources/views/page_builder/_{$this->filename}.antlers.html");

            $this->createFieldset();
            $this->createPartial();
            $this->updatePageBuilder();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        $this->info("Peak page builder block '{$this->block_name}' added.");
    }

    /**
     * Check if a file doesn't already exist.
     *
     * @return bool|null
     */
    protected function checkExistence($type, $path)
    {
        if (File::exists(base_path($path))) {
            throw new \Exception("{$type} '{$path}' already exists.");
        }
    }

    /**
     * Create fieldset.
     *
     * @return bool|null
     */
    protected function createFieldset()
    {
        $stub = File::get(__DIR__.'/stubs/fieldset_set.yaml.stub');
        $contents = Str::of($stub)
            ->replace('{{ name }}', $this->block_name);

        File::put(base_path("resources/fieldsets/{$this->filename}.yaml"), $contents);
    }

    /**
     * Create partial.
     *
     * @return bool|null
     */
    protected function createPartial()
    {
        $stub = File::get(__DIR__.'/stubs/block.html.stub');
        $contents = Str::of($stub)
            ->replace('{{ name }}', $this->block_name)
            ->replace('{{ filename }}', $this->filename);

        File::put(base_path("resources/views/page_builder/_{$this->filename}.antlers.html"), $contents);
    }

    /**
     * Update page_builder.yaml.
     *
     * @return bool|null
     */
    protected function updatePageBuilder()
    {
        $fieldset = Yaml::parseFile(base_path('resources/fieldsets/page_builder.yaml'));
        $newSet = [
            'display' => $this->block_name,
            'instructions' => $this->instructions,
            'fields' => [
                [
                    'import' => $this->filename
                ]
            ]
        ];

        $existingSets = Arr::get($fieldset, 'fields.0.field.sets');
        $existingSets[$this->filename] = $newSet;
        $existingSets = collect($existingSets)->sortBy(function ($value, $key) {
            return $key;
        })->all();

        Arr::set($fieldset, 'fields.0.field.sets', $existingSets);

        File::put(base_path('resources/fieldsets/page_builder.yaml'), Yaml::dump($fieldset, 99, 2));
    }
}
