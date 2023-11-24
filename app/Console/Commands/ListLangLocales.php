<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LaravelLang\Locales\Facades\Locales;
use Statamic\Console\RunsInPlease;

class ListLangLocales extends Command
{
    use RunsInPlease;

    protected $signature = 'statamic:peak:list-lang-locales';

    public function handle()
    {
        echo json_encode(Locales::raw()->available(), JSON_THROW_ON_ERROR);
    }
}
