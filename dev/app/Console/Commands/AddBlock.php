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

class AddBlock extends Command
{
    use RunsInPlease, SharedFunctions;

    protected $name = 'statamic:peak:add-block';
    protected $description = "Add a page builder block.";
    protected $block_name = '';
    protected $filename = '';
    protected $instructions = '';

    public function handle()
    {
        $this->block_name = $this->ask('What should be the name for this block?');
        $this->filename = Stringy::slugify($this->block_name, '_', Config::getShortLocale());
        $this->instructions = $this->ask('What should be the instructions for this block?');

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
     * Create fieldset.
     *
     * @return bool|null
     */
    protected function createFieldset()
    {
        $stub = File::get(__DIR__.'/stubs/fieldset_block.yaml.stub');
        $contents = Str::of($stub)
            ->replace('{{ name }}', str_replace('"','\'', $this->block_name));


        File::put(base_path("resources/fieldsets/{$this->filename}.yaml"), $contents);
    }

    /**
     * Create partial.
     *
     * @return bool|null
     */
    protected function createPartial()
    {
        $stub = File::get(__DIR__.'/stubs/block.antlers.html.stub');
        $contents = Str::of($stub)
            ->replace('{{ name }}', $this->block_name)
            ->replace('{{ filename }}', $this->filename);

        File::put(base_path("resources/views/page_builder/_{$this->filename}.antlers.html"), $contents);
    }
}
