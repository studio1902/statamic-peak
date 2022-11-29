<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Statamic\Console\RunsInPlease;
use Stringy\StaticStringy as Stringy;

class InstallPreset extends Command
{
    use RunsInPlease, SharedFunctions, InstallPresetPresets;

    protected $choices = '';
    protected $description = "Install premade collections and page builder blocks into your site.";
    protected $handle = '';
    protected $presets = '';
    protected $name = 'statamic:peak:install-preset';

    public function handle()
    {
        $this->getPresets();

        $this->choices = $this->choice(
            'Which presets do you want to install into your site? You can separate multiple answers with a comma',
            $this->presets->map(function ($preset, $key) {
                return "{$preset['name']}: {$preset['description']} [{$preset['handle']}]";
            })->toArray(),
            null, null, true
        );

        foreach($this->choices as $choice) {
            $this->handle = Stringy::between($choice, '[', ']');
            $preset = $this->presets->filter(function ($preset, $key) {
                return $preset['handle'] == $this->handle;
            })->first();

            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path(),
            ]);

            collect($preset['operations'])->each(function ($operation, $key) use ($disk) {
                if ($operation['type'] == 'copy') {
                    $disk->copy("app/Console/Commands/stubs/presets/{$this->handle}/{$operation['input']}", "{$operation['output']}");
                    $this->info("Installed file: '{$operation['output']}'.");
                }

                elseif ($operation['type'] == 'update_page_builder') {
                    $this->updatePageBuilder($operation['block']['name'], $operation['block']['instructions'], $operation['block']['handle']);
                    $this->info("Installed page builder block: '{$operation['block']['name']}'.");
                }

                elseif($operation['type'] == 'notify') {
                    $this->warn($operation['content']);
                }
            });

            Artisan::call('cache:clear');

            $this->info("Peak preset '{$preset['name']}' installed.");
        }
    }
}
