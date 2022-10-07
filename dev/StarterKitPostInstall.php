<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class StarterKitPostInstall
{
    public $registerCommands = [
        \App\Console\Commands\ClearSite::class,
        \App\Console\Commands\InstallBlock::class
    ];

    public function handle($console)
    {
        $console->call('statamic:peak:clear-site');

        if ($console->confirm('Do you want overwrite your `.env` file with the Peak presets?', true)) {
            $appName = $console->ask('What should be your app name?');
            $originalAppUrl = env('APP_URL');
            $originalAppKey = env('APP_KEY');
            $env = app('files')->get(base_path('.env.example'));
            $env = str_replace("APP_NAME='Statamic Peak'", "APP_NAME='{$appName}'", $env);
            $env = str_replace('APP_URL=', "APP_URL='{$originalAppUrl}'", $env);
            $env = str_replace('APP_KEY=', "APP_KEY='{$originalAppKey}'", $env);
            app('files')->put(base_path('.env'), $env);
        }

        if ($console->confirm('Do you want to exclude the `public/build` folder from git?', true)) {
            app('files')->append(base_path('.gitignore'), "\n/public/build/");
        }

        if ($console->confirm('Do you want to exclude the `users` folder from git?', false)) {
            app('files')->append(base_path('.gitignore'), "\n/users");
        }

        if ($console->confirm('Do you want to exclude the `storage/form` folder from git?', false)) {
            app('files')->append(base_path('.gitignore'), "\n/storage/forms");
        }

        if ($console->confirm('Do you want to install premade blocks into your page builder?', false)) {
            $console->call('statamic:peak:install-block');
        }

        if ($console->confirm('Do you want to install npm dependencies?', true)) {
            $process = new Process(['npm', 'i']);
            try {
                $process->mustRun();
                $console->info('Dependencies installed.');
            } catch (ProcessFailedException $exception) {
                $console->info($exception->getMessage());
            }
        }

        if ($console->confirm('Would you like to star the Peak repo?', false)) {
            if(PHP_OS_FAMILY == 'Darwin') exec('open https://github.com/studio1902/statamic-peak');
            if(PHP_OS_FAMILY == 'Windows') exec('start https://github.com/studio1902/statamic-peak');
            if(PHP_OS_FAMILY == 'Linux') exec('xdg-open https://github.com/studio1902/statamic-peak');

            $console->info('Thank you and enjoy the view!');
        }
    }
}
