<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
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
                        'input' => 'news-collection.yaml.stub',
                        'output' => 'content/collections/news.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news.md.stub',
                        'output' => 'content/collections/pages/news.md'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'index.antlers.html.stub',
                        'output' => 'resources/views/news/index.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'show.antlers.html.stub',
                        'output' => 'resources/views/news/show.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news.antlers.html.stub',
                        'output' => 'resources/views/page_builder/_news.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'index_content.antlers.html.stub',
                        'output' => 'resources/views/page_builder/_index_content.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news_item.antlers.html.stub',
                        'output' => 'resources/views/components/_news_items.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'news-fieldset.yaml.stub',
                        'output' => 'resources/fieldsets/news.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'index_content.yaml.stub',
                        'output' => 'resources/fieldsets/index_content.yaml'
                    ],
                    [
                        'type' => 'update_page_builder',
                        'blocks' => ['index_content', 'news']
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
            dd($this->handle);
        }
    }
}
