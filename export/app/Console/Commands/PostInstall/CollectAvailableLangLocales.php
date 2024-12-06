<?php

namespace App\Console\Commands\PostInstall;

use Illuminate\Console\Command;
use LaravelLang\Locales\Facades\Locales;
use Statamic\Console\RunsInPlease;

class CollectAvailableLangLocales extends Command
{
    use RunsInPlease;

    protected $signature = 'statamic:peak:collect-available-lang-locales';

    public function handle(): void
    {
        echo json_encode(Locales::raw()->available(), JSON_THROW_ON_ERROR);
    }
}
