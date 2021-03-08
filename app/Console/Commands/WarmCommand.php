<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;

class WarmCommand extends Command
{
    use RunsInPlease;

    protected $name = 'peak:warm';
    protected $description = "Warms the static cache by visiting all entry URL's.";

    public function handle() {
        $this->info('Warming the static cache');

        $this->context = stream_context_create(array(
            'http' => array('ignore_errors' => true),
        ));

        Entry::query()
            ->where('status', 'published')
            ->get()
            ->map->absoluteUrl()
            ->unique()
            ->each(function ($url) {
                $visit = file_get_contents($url, false, $this->context);
        });
    }

    
}