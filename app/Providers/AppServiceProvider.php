<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Studio1902\PeakSeo\Handlers\ErrorPage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Statamic::script('app', 'cp');
        // Statamic::style('app', 'cp');

        ErrorPage::handle404AsEntry();
    }
}
