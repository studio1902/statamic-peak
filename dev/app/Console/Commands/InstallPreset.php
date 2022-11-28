<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Statamic\Console\RunsInPlease;

class InstallPreset extends Command
{
    use RunsInPlease, SharedFunctions;

    protected $name = 'statamic:peak:install-preset';
    protected $description = "Install premade collections and page builder blocks into your site.";
    protected $choices = '';
    protected $presets = [];

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
    }
}
