<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Statamic\Console\RunsInPlease;
use Statamic\Facades\Entry;

class WarmCommand extends Command
{
    use RunsInPlease;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'statamic:peak:warm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Warms the static cache by visiting the published entry URLs.";

    /**
     * @var resource
     */
    private $context;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->prepareStreamContext();

        $urls = $this->getUrlsToWarmUp();

        $this->info('Getting ready to warm up ' . $urls->count() . ' urls...');

        $urls->each(function ($url) {
            $this->line(sprintf('Warming: <info>%s</info>', $url));

            file_get_contents($url, false, $this->context);
        });

        $this->info('Your static cache is now warm and shiny...');

        return 0;
    }

    /**
     * Retrieve all urls we want to warm.
     *
     * @return Collection
     */
    protected function getUrlsToWarmUp(): Collection
    {
        return collect(config('statamic.static_caching.warm', []))
            ->map(function($url) {
                return url($url);
            })
            ->merge($this->getEntryUrls())
            ->unique()
            ->filter();

    }

    /**
     * Retrieves the urls of your published entries
     *
     * @return Collection
     */
    protected function getEntryUrls(): Collection
    {
        return Entry::query()
            ->where('status', 'published')
            ->get()
            ->map->absoluteUrl();
    }

    protected function prepareStreamContext(): void
    {
        $this->context = stream_context_create([
            'http' => ['ignore_errors' => true],
        ]);
    }
}
