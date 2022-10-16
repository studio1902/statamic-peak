<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Support\Arr;
use Stringy\StaticStringy as Stringy;
use Symfony\Component\Yaml\Yaml;

class InstallBlock extends Command
{
    use RunsInPlease;

    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'statamic:peak:install-block';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Install premade blocks into your page builder.";

    /**
     * The block name.
     *
     * @var string
     */
    protected $block_name = '';

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
            'Which blocks do you want to install into your page builder? You can separate multiple answers with a comma',
            [
                'Call to action: Show a call to action. [call_to_action]',
                'Collection: Show collection entries. [collection]',
                'Columns: Text columns with optional images and buttons. [columns]',
                'Divider: A visual divider between blocks. [divider]',
                'Full width image: A full width image with optional text and button(s). [full_width_image]',
                'Image and text: An image and text side by side. [image_and_text]',
                'Images grid: A multi row image grid. [images_grid]'
            ],
            null, null, true
        );

        foreach($this->choices as $choice) {
            $this->block_name = Stringy::split($choice, ':')[0];
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

            $this->info("Peak page builder block '{$this->block_name}' installed.");
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
