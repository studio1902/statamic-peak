<?php

namespace App\Console\Commands;

trait InstallPresetPresets {

    public function getPresets() {
        $this->presets = collect([
            [
                'handle' => 'breadcrumbs',
                'name' => 'Breadcrumbs',
                'description' => 'A breadcrumbs partial using schema markup.',
                'operations' => [
                    [
                        'type' => 'copy',
                        'input' => 'breadcrumbs.antlers.html.stub',
                        'output' => 'resources/views/navigation/_breadcrumbs.antlers.html'
                    ]
                ]
            ],
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
                        'type' => 'update_role',
                        'role' => 'editor',
                        'permissions' => ['view events entries', 'edit events entries', 'create events entries', 'delete events entries', 'publish events entries', 'reorder events entries', 'edit other authors events entries', 'publish other authors events entries', 'delete other authors events entries']
                    ],
                    [
                        'type' => 'notify',
                        'content' => "\nAdd this to your `config/statamic/cp.php` widgets array:\n\n[\n\t'type' => 'collection',\n\t'collection' => 'events',\n\t'width' => 50\n],\n"
                    ]
                ]
            ],
            [
                'handle' => 'faq',
                'name' => 'FAQ',
                'description' => 'A FAQ collection with a page builder set (including JSON-ld).',
                'operations' => [
                    [
                        'type' => 'copy',
                        'input' => 'faq_blueprint.yaml.stub',
                        'output' => 'resources/blueprints/collections/faq/faq.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'faq_collection.yaml.stub',
                        'output' => 'content/collections/faq.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'faq_fieldset.yaml.stub',
                        'output' => 'resources/fieldsets/faq.yaml'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'faq.antlers.html.stub',
                        'output' => 'resources/views/page_builder/_faq.antlers.html'
                    ],
                    [
                        'type' => 'copy',
                        'input' => 'question.antlers.html.stub',
                        'output' => 'resources/views/components/_question.antlers.html'
                    ],
                    [
                        'type' => 'update_page_builder',
                        'block' => [
                            'name' => 'FAQ',
                            'instructions' => 'List frequently asked questions in an accordion.',
                            'handle' => 'faq',
                        ]
                    ],
                    [
                        'type' => 'update_role',
                        'role' => 'editor',
                        'permissions' => ['view faq entries', 'edit faq entries', 'create faq entries', 'delete faq entries', 'publish faq entries', 'reorder faq entries', 'edit other authors faq entries', 'publish other authors faq entries', 'delete other authors faq entries']
                    ],
                    [
                        'type' => 'notify',
                        'content' => "\nAdd this to your `config/statamic/cp.php` widgets array:\n\n[\n\t'type' => 'collection',\n\t'collection' => 'faq',\n\t'width' => 50\n],\n"
                    ]
                ],
            ],
            [
                'handle' => 'language_picker',
                'name' => 'Language picker',
                'description' => 'A language picker for when you use multisite.',
                'operations' => [
                    [
                        'type' => 'copy',
                        'input' => 'language_picker.antlers.html.stub',
                        'output' => 'resources/views/navigation/_language_picker.antlers.html'
                    ],
                    [
                        'type' => 'notify',
                        'content' => "\nAdd `{{ partial:navigation/language_picker }}` as the last list item in the main ul in `resources/views/navigation/_main.antlers.html`.\n"
                    ]
                ]
            ],
            [
                'handle' => 'modal',
                'name' => 'Modal',
                'description' => 'A modal that only has to be renderd once but can be used multiple times with different content..',
                'operations' => [
                    [
                        'type' => 'copy',
                        'input' => 'modal.antlers.html.stub',
                        'output' => 'resources/views/components/_modal.antlers.html'
                    ],
                    [
                        'type' => 'notify',
                        'content' => "\nMake sure to `{{ yield:modal }}` in your layout file before closing the `<body>`."
                    ],
                    [
                        'type' => 'notify',
                        'content' => "\nInvoke by calling:\n\n{{ partial:components/modal label_open=\"Open modal label\" label_close=\"Close modal label\" label_aria=\"Modal aria-label\" }}\n\t{{ slot:content }}\n\t\t{{# Add modal content here. #}}\n\t{{ /slot:content }}\n{{ /partial:components/modal }}.\n"
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
                        'type' => 'update_role',
                        'role' => 'editor',
                        'permissions' => ['view news entries', 'edit news entries', 'create news entries', 'delete news entries', 'publish news entries', 'reorder news entries', 'edit other authors news entries', 'publish other authors news entries', 'delete other authors news entries']
                    ],
                    [
                        'type' => 'notify',
                        'content' => "\nAdd this to your `config/statamic/cp.php` widgets array:\n\n[\n\t'type' => 'collection',\n\t'collection' => 'news',\n\t'width' => 50\n],\n"
                    ]
                ]
            ]
        ]);
    }
}
