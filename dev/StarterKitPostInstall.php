<?php

use Illuminate\Support\Facades\Artisan;

class StarterKitPostInstall
{
    public function handle($console)
    {
        $console->call('statamic:peak:clear-site');

        if ($console->confirm('Do you want overwrite your .env file with the Peak presets?', true)) {
            $originalAppUrl = env('APP_URL');
            $originalAppKey = env('APP_KEY');
            $env = app('files')->get(base_path('.env.example'));
            $env = str_replace('APP_URL=', 'APP_URL='.$originalAppUrl, $env);
            $env = str_replace('APP_KEY=', 'APP_KEY='.$originalAppKey, $env);
            app('files')->put(base_path('.env'), $env);
        }

        if ($console->confirm('Do you compile assets on your server?', true)) {
            $gitignore = app('files')->get(base_path('.gitignore'));
            app('files')->append(base_path('.gitignore'), "\n/public/build/");
        }

        if ($console->confirm('Do you want to exclude users from git?', false)) {
            $gitignore = app('files')->get(base_path('.gitignore'));
            app('files')->append(base_path('.gitignore'), "\n/users");
        }

        if ($console->confirm('Do you want to exclude form entries from git?', false)) {
            app('files')->append(base_path('.gitignore'), "\n/storage/forms");
        }

        if ($console->confirm('Enjoying the view? Would you like to star the repo?', false)) {
            if(PHP_OS_FAMILY == 'Darwin') exec('open https://github.com/studio1902/statamic-peak');
            if(PHP_OS_FAMILY == 'Windows') exec('start https://github.com/studio1902/statamic-peak');
            if(PHP_OS_FAMILY == 'Linux') exec('xdg-open https://github.com/studio1902/statamic-peak');

            $console->info('Thank you!');
        }
    }
}
