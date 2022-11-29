<?php

namespace App\Console\Commands;

trait InstallPresetPresets {

    public function getPresets() {
        $this->presets = collect([
            [
                'handle' => 'events',
                'name' => 'Events',
                'description' => 'A dated events collection with index and show templates (including JSON-ld) and a page builder set.',
                'operations' => [
                    [
                        'type' => 'copy',
                        'input' => 'events_blueprint.yaml.stub',
                        'output' => 'resources/blueprints/collections/events/events.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'events_collection.yaml.stub',
                        'output' => 'content/collections/events.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'events_fieldset.yaml.stub',
                        'output' => 'resources/fieldsets/events.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'events_item.antlers.html.stub',
                        'output' => 'resources/views/components/_events_item.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'events.antlers.html.stub',
                        'output' => 'resources/views/page_builder/_events.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'events.md.stub',
                        'output' => 'content/collections/pages/events.md'
                    ],
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
                        'output' => 'resources/views/events/index.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'show.antlers.html.stub',
                        'output' => 'resources/views/events/show.antlers.html'
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
                            'name' => 'Events',
                            'instructions' => 'List upcoming events.',
                            'handle' => 'events',
                        ]
                    ],
                    [
                        'type' => 'notify',
                        'content' => "1. Add this to your `lang/locale/strings.php` file:\n\n// Events\n'events_all' => 'All events',\n'events_date' => 'Date',\n'events_date_start' => 'Start date',\n'events_date_end' => 'End date',\n'events_more' => 'More events',\n'events_more' => 'More events',\n'events_when' => 'When',\n'events_where' => 'Where',\n'events_organizer' => 'Organizer',\n'events_tickets' => 'Tickets',\n\n"
                    ],
                    [
                        'type' => 'notify',
                        'content' => "2. Add this to your `config/statamic/cp.php` widgets array:\n\n[\n\t'type' => 'collection',\n\t'collection' => 'events',\n\t'width' => 50\n],\n\n"
                    ]
                ]
            ],
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
                        'content' => "1. Add this to your `lang/locale/strings.php` file:\n\n// News\n'news_all' => 'All news',\n'news_more' => 'More news',\n\n"
                    ],
                    [
                        'type' => 'notify',
                        'content' => "2. Add this to your `config/statamic/cp.php` widgets array:\n\n[\n\t'type' => 'collection',\n\t'collection' => 'news',\n\t'width' => 50\n],\n\n"
                    ]
                ]
            ]
        ]);
    }
}
