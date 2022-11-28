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
    use RunsInPlease, SharedFunctions;

    protected $name = 'statamic:peak:add-set';
    protected $description = "Add an Article (Bard) set.";
    protected $set_name = '';
    protected $filename = '';

    public function handle()
    {
        $this->set_name = $this->ask('What should be the name for this set?');
        $this->filename = Stringy::slugify($this->set_name, '_', Config::getShortLocale());

        try {
            $this->checkExistence('Fieldset', "resources/fieldsets/{$this->filename}.yaml");
            $this->checkExistence('Partial', "resources/views/components/_{$this->filename}.antlers.html");

            $this->createFieldset();
            $this->createPartial();
            $this->updateArticleSets();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        $this->info("Peak page builder Article set '{$this->set_name}' added.");
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
            ->replace('{{ name }}', $this->set_name);

        File::put(base_path("resources/fieldsets/{$this->filename}.yaml"), $contents);
    }

    /**
     * Create partial.
     *
     * @return bool|null
     */
    protected function createPartial()
    {
        $stub = File::get(__DIR__.'/stubs/set.html.stub');
        $contents = Str::of($stub)
            ->replace('{{ name }}', $this->set_name)
            ->replace('{{ filename }}', $this->filename);

        File::put(base_path("resources/views/components/_{$this->filename}.antlers.html"), $contents);
    }

    /**
     * Update article.yaml.
     *
     * @return bool|null
     */
    protected function updateArticleSets()
    {
        $fieldset = Yaml::parseFile(base_path('resources/fieldsets/article.yaml'));
        $newSet = [
            'display' => $this->set_name,
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

        File::put(base_path('resources/fieldsets/article.yaml'), Yaml::dump($fieldset, 99, 2));
    }
}