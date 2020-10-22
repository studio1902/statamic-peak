<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Statamic\Facades\Entry;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

// A simple way to get al URL's and visit them to warm up the static cache.
Artisan::command('warm', function () {
    Entry::query()
        ->where('status', 'published')
        ->get()
        ->map->absoluteUrl()
        ->unique()
        ->each(function ($url) {
            file_get_contents($url);
        });
});