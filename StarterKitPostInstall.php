<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class StarterKitPostInstall
{
    public function handle($console)
    {
        if ($console->confirm('Do you want overwrite your `.env` file with the Peak presets?', true)) {
            $appName = $console->ask('What should be your app name?');
            $appName = preg_replace('/([\'|\"|#])/m', '', $appName);
            $debugBarEnabled = $console->confirm('Do you want to use the debugbar?', false);
            $originalAppUrl = env('APP_URL');
            $originalAppKey = env('APP_KEY');

            $env = app('files')->get(base_path('.env.example'));
            $env = str_replace("APP_NAME=\"Statamic Peak\"", "APP_NAME=\"{$appName}\"", $env);
            $env = str_replace('APP_URL=', "APP_URL=\"{$originalAppUrl}\"", $env);
            $env = str_replace('APP_KEY=', "APP_KEY=\"{$originalAppKey}\"", $env);
            if (!$debugBarEnabled) $env = str_replace('DEBUGBAR_ENABLED=true', "DEBUGBAR_ENABLED=false", $env);

            $readme = app('files')->get(base_path('README.md'));
            $readme = str_replace("APP_NAME=\"Statamic Peak\"", "APP_NAME=\"{$appName}\"", $readme);
            $readme = str_replace('APP_KEY=', "APP_KEY=\"{$originalAppKey}\"", $readme);

            if ($console->confirm('Do you want use Imagick as an image processor instead of GD?', true)) {
                $env = str_replace('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick', $env);
                $readme = str_replace('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick', $readme);
            }

            app('files')->put(base_path('.env'), $env);
            app('files')->put(base_path('README.md'), $readme);
        }

        if ($console->confirm('Do you want to init a git repo and configure gitignore?', true)) {
            $process = new Process(['git', 'init']);
            try {
                $process->mustRun();
                $console->info('Repo initialised.');
            } catch (ProcessFailedException $exception) {
                $console->info($exception->getMessage());
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
        }

        if ($console->confirm('Do you want to composer require spatie/browsershot for generating social images?', true)) {
            $process = new Process(['composer', 'require', 'spatie/browsershot']);
            try {
                $process->mustRun();
                $console->info('Browsershot installed.');
            } catch (ProcessFailedException $exception) {
                $console->info($exception->getMessage());
            }
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

            $console->info('Thank you!');
        }

        $console->info('<info>[✓]</info> Peak is installed. Enjoy the view!');
        $console->newline();
        $console->warn('Run `php please peak:clear-site` to get rid of default content.');
        $console->newline();
        $console->warn('Run `php please peak:install-preset` to install premade sets onto your website.');
        $console->newline();
        $console->warn('Run `php please peak:install-block` to install premade blocks onto your page builder.');
        $console->newline();
    }
}
