<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Studio1902\PeakSeo\Handlers\ErrorPage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Statamic::script('app', 'cp');
        // Statamic::style('app', 'cp');

        ErrorPage::handle404AsEntry();
    }
}
