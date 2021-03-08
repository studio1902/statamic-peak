<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;

class SeoCommand extends Command
{
    use RunsInPlease;

    protected $name = 'peak:seo';
    protected $description = "Publishes everything you need to use Peak's SEO features in your project.";

    public function handle()
    {
        $this->info('Installing Peak SEO.');

        File::copyDirectory(__DIR__ . '/../../../stubs/seo', base_path());
    }
}
