<?php

namespace App\Console\Commands\PostInstall;

use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use LaravelLang\Locales\Facades\Locales;
use Statamic\Console\RunsInPlease;

#[Signature('statamic:peak:collect-available-lang-locales')]
class CollectAvailableLangLocales extends Command
{
    use RunsInPlease;

    public function handle(): void
    {
        echo json_encode(Locales::raw()->available(), JSON_THROW_ON_ERROR);
    }
}
