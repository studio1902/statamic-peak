<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Facades\Config;
use Stringy\StaticStringy as Stringy;

class AddPartial extends Command
{
    use RunsInPlease, SharedFunctions;

    protected $name = 'statamic:peak:add-partial';
    protected $description = "Add a partial with IDE hinting and template paths.";
    protected $partial_name = '';
    protected $partial_description = '';
    protected $filename = '';
    protected $folder = '';
    protected $type = '';

    public function handle()
    {
        $this->type = $this->choice(
            'What type of partial do you want to add?',
            [
                'Component',
                'Layout',
                'Typography'
            ]
        );
        $this->folder = strtolower($this->type);
        if ($this->folder == 'component') $this->folder = 'components';
        $this->partial_name = $this->ask('What should be the name for this partial?');
        $this->partial_description = $this->ask('What should be the description for this partial?');
        $this->filename = Stringy::slugify($this->partial_name, '_', Config::getShortLocale());

        try {
            $this->checkExistence('Partial', "resources/views/{$this->folder}/_{$this->filename}.antlers.html");

            $this->createPartial();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        $this->info("{$this->type} '{$this->filename}' added.");
    }

    /**
     * Create partial.
     *
     * @return bool|null
     */
    protected function createPartial()
    {
        $stub = File::get(__DIR__.'/stubs/partial.antlers.html.stub');
        $contents = Str::of($stub)
            ->replace('{{ partial_name }}', $this->partial_name)
            ->replace('{{ partial_description }}', $this->partial_description)
            ->replace('{{ folder }}', $this->folder)
            ->replace('{{ filename }}', $this->filename);

        File::put(base_path("resources/views/{$this->folder}/_{$this->filename}.antlers.html"), $contents);
    }
}
