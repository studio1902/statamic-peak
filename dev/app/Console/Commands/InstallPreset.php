<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Support\Arr;
use Stringy\StaticStringy as Stringy;
use Symfony\Component\Yaml\Yaml;

class InstallPreset extends Command
{
    use RunsInPlease;

    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'statamic:peak:install-preset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Install premade collections and page builder blocks into your site.";

    /**
     * The block name.
     *
     * @var string
     */
    protected $preset_name = '';

    /**
     * The chosen block.
     *
     * @var string
     */
    protected $choices = '';

    /**
     * The filename.
     *
     * @var string
     */
    protected $filename = '';

    /**
     * The instructions.
     *
     * @var string
     */
    protected $instructions = '';

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $this->choices = $this->choice(
            'Which presets do you want to install into your site? You can separate multiple answers with a comma',
            [
                'News: A dated news collection with index and show templates (including JSON-ld) and a page builder set. [news]',
            ],
            null, null, true
        );

        // Copy news-collection.yaml.stub -> content/collections/news.yaml
        // Copy news.md.stub -> content/collections/pages/news.md
        // Copy index.antlers.html.stub -> resources/views/news/index.antlers.html
        // Copy show.antlers.html.stub -> resources/views/news/show.antlers.html
        // Copy news.antlers.html.stub -> resources/views/page_builder/_news.antlers.html
        // Copy index_content.antlers.html.stub -> resources/views/page_builder/_index_content.antlers.html
        // Copy news_item.antlers.html.stub -> resources/views/components/_news_items.antlers.html
        // Copy news-fieldset.yaml.stub -> resources/fieldsets/news.yaml
        // Copy index_content.yaml.stub -> resources/fieldsets/index_content.yaml
        // Add `index_content` and `news` to page builder.

        foreach($this->choices as $choice) {
            $this->preset_name = Stringy::split($choice, ':')[0];
            $this->filename = Stringy::between($choice, '[', ']');
            $this->instructions = Stringy::between($choice, ': ', ' [');

            try {
                $this->checkExistence('Fieldset', "resources/fieldsets/{$this->filename}.yaml");
                $this->checkExistence('Partial', "resources/views/page_builder/_{$this->filename}.antlers.html");

                $this->copyStubs();
                $this->updatePageBuilder();
            } catch (\Exception $e) {
                return $this->error($e->getMessage());
            }

            $this->info("Peak preset '{$this->preset_name}' installed.");
        }
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
     * Copy yaml and html stubs.
     *
     * @return bool|null
     */
    protected function copyStubs()
    {
        File::put(base_path("resources/fieldsets/{$this->filename}.yaml"), File::get(__DIR__."/stubs/blocks/{$this->filename}.yaml.stub"));
        File::put(base_path("resources/views/page_builder/_{$this->filename}.antlers.html"), File::get(__DIR__."/stubs/blocks/{$this->filename}.antlers.html.stub"));
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
            'display' => $this->preset_name,
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
