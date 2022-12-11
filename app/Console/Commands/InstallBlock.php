<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Support\Arr;
use Stringy\StaticStringy as Stringy;

class InstallBlock extends Command
{
    use RunsInPlease, SharedFunctions, InstallBlockBlocks;

    protected $name = 'statamic:peak:install-block';
    protected $description = "Install premade blocks into your page builder.";
    protected $block_name = '';
    protected $choices = '';
    protected $filename = '';
    protected $instructions = '';

    public function handle()
    {
        $this->choices = $this->choice(
            'Which blocks do you want to install into your page builder? You can separate multiple answers with a comma',
            $this->getBlocks(),
            null, null, true
        );

        foreach($this->choices as $choice) {
            $this->block_name = Stringy::split($choice, ':')[0];
            $this->filename = Stringy::between($choice, '[', ']');
            $this->instructions = Stringy::between($choice, ': ', ' [');

            try {
                $this->copyStubs();
                $this->updatePageBuilder($this->block_name, $this->instructions, $this->filename);
            } catch (\Exception $e) {
                return $this->error($e->getMessage());
            }

            $this->info("Peak page builder block '{$this->block_name}' installed.");
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
}
