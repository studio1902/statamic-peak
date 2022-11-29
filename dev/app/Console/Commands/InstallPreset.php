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
    use RunsInPlease, SharedFunctions;

    protected $choices = '';
    protected $description = "Install premade collections and page builder blocks into your site.";
    protected $handle = '';
    protected $presets = '';
    protected $name = 'statamic:peak:install-preset';

    public function handle()
    {
        $this->presets = collect([
            [
                'handle' => 'news',
                'name' => 'News',
                'description' => 'A dated news collection with index and show templates (including JSON-ld) and a page builder set.',
                'operations' => [
                    [
                        'type' => 'copy',
                        'input' => 'index_content.antlers.html.stub',
                        'output' => 'resources/views/page_builder/_index_content.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'index_content.yaml.stub',
                        'output' => 'resources/fieldsets/index_content.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'index.antlers.html.stub',
                        'output' => 'resources/views/news/index.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news_blueprint.yaml.stub',
                        'output' => 'resources/blueprints/collections/news/news.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news_collection.yaml.stub',
                        'output' => 'content/collections/news.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news_fieldset.yaml.stub',
                        'output' => 'resources/fieldsets/news.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news_item.antlers.html.stub',
                        'output' => 'resources/views/components/_news_item.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news.antlers.html.stub',
                        'output' => 'resources/views/page_builder/_news.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news.md.stub',
                        'output' => 'content/collections/pages/news.md'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'show.antlers.html.stub',
                        'output' => 'resources/views/news/show.antlers.html'
                    ],
                    [
                        'type' => 'update_page_builder',
                        'block' => [
                            'name' => 'Index content',
                            'instructions' => 'Render the currently mounted entries if available.',
                            'handle' => 'index_content',
                        ]
                    ],
                    [
                        'type' => 'update_page_builder',
                        'block' => [
                            'name' => 'News',
                            'instructions' => 'List the most recent news.',
                            'handle' => 'news',
                        ]
                    ],
                    [
                        'type' => 'notify',
                        'content' => "
                            Add this to your string files.
                            // News
                            'strings.news_all' => 'All news',
                            'strings.news_more' => 'More news',
                        "
                    ],
                    [
                        'type' => 'notify',
                        'content' => "
                            Add this to your cp.php widgets array for a dashboard widget:
                            [
                                'type' => 'collection',
                                'collection' => 'pages',
                                'width' => 50
                            ],
                        "
                    ]
                ]
            ]
        ]);

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
                    $this->info($operation['content']);
                }
            });

            Artisan::call('cache:clear');

            $this->info("Peak preset '{$preset['name']}' installed.");
        }
    }
}
