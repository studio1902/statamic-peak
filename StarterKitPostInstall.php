<?php

use LaravelLang\Publisher\Facades\Helpers\Locales;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\suggest;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;


class StarterKitPostInstall
{
    public function handle(): void
    {
        if (
            confirm(
                label: 'Do you want overwrite your `.env` file with the Peak presets?',
                default: true,
            )
        ) {
            $appName = text(
                label: 'What should be your app name?',
                placeholder: 'Statamic Peak',
                default: 'Statamic Peak',
            );
            $appName = preg_replace('/([\'|\"|#])/m', '', $appName);

            $debugBarEnabled = confirm(
                label: 'Do you want to use the debugbar?',
                default: false,
            );

            $originalAppUrl = env('APP_URL');
            $originalAppKey = env('APP_KEY');

            $env = app('files')->get(base_path('.env.example'));
            $env = str_replace(
                [
                    'APP_NAME="Statamic Peak"',
                    'APP_URL=',
                    'APP_KEY=',
                ],
                [
                    "APP_NAME=\"{$appName}\"",
                    "APP_URL=\"{$originalAppUrl}\"",
                    "APP_KEY=\"{$originalAppKey}\""
                ],
                $env
            );

            if (!$debugBarEnabled) {
                $env = str_replace('DEBUGBAR_ENABLED=true', 'DEBUGBAR_ENABLED=false', $env);
            }

            $readme = app('files')->get(base_path('README.md'));
            $readme = str_replace(
                [
                    'APP_NAME="Statamic Peak"',
                    'APP_KEY='
                ],
                [
                    "APP_NAME=\"{$appName}\"",
                    "APP_KEY=\"{$originalAppKey}\""
                ],
                $readme
            );

            if (
                confirm(
                    label: 'Do you want use Imagick as an image processor instead of GD?',
                    default: true,
                )
            ) {
                $env = str_replace('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick', $env);
                $readme = str_replace('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick', $readme);
            }

            if (
                confirm(
                    label: 'Do you want to enable `SAVE_CACHED_IMAGES` (slower initial page load)?',
                    default: false,
                )
            ) {
                $env = str_replace('SAVE_CACHED_IMAGES=false', 'SAVE_CACHED_IMAGES=true', $env);
                $readme = str_replace('SAVE_CACHED_IMAGES=false', 'SAVE_CACHED_IMAGES=true', $readme);
            }

            app('files')->put(base_path('.env'), $env);
            app('files')->put(base_path('README.md'), $readme);
        }

        if (
            confirm(
                label: 'Do you want to init a git repo and configure gitignore?',
                default: true,
            )
        ) {
            $process = new Process(['git', 'init']);
            try {
                $process->mustRun();
                info('Repo initialised.');
            } catch (ProcessFailedException $exception) {
                error($exception->getMessage());
            }

            if (
                confirm(
                    label: 'Do you want to exclude the `public/build` folder from git?',
                    default: true,
                )
            ) {
                app('files')->append(base_path('.gitignore'), "\n/public/build/");
            }

            if (
                confirm(
                    label: 'Do you want to exclude the `users` folder from git?',
                    default: false,
                )
            ) {
                app('files')->append(base_path('.gitignore'), "\n/users");
            }

            if (
                confirm(
                    label: 'Do you want to exclude the `storage/form` folder from git?',
                    default: false,
                )
            ) {
                app('files')->append(base_path('.gitignore'), "\n/storage/forms");
            }
        }

        if (
            confirm(
                label: 'Do you want to install npm dependencies?',
                default: true,
            )
        ) {
            $process = new Process(['npm', 'i']);
            try {
                $process->mustRun();
                info('Dependencies installed.');
            } catch (ProcessFailedException $exception) {
                error($exception->getMessage());
            }
        }

        if (
            confirm(
                label: 'Do you want to `npm i puppeteer` and `composer require spatie/browsershot` for generating social images?',
                default: true,
            )
        ) {
            $process = new Process(['npm', 'i', 'puppeteer']);
            try {
                $process->mustRun();
                info('Puppeteer installed.');
            } catch (ProcessFailedException $exception) {
                error($exception->getMessage());
            }

            $process = new Process(['composer', 'require', 'spatie/browsershot']);
            try {
                $process->mustRun();
                info('Browsershot installed.');
            } catch (ProcessFailedException $exception) {
                error($exception->getMessage());
            }
        }

        if (
            confirm(
                label: 'Do you want to install missing Laravel translation files using the Laravel Lang package?',
                default: true,
            )
        ) {
            $process = new Process(['composer', 'require', 'laravel-lang/common', '--dev']);
            try {
                $process->mustRun();

                info('Laravel Lang installed.');

                info('Enter the handles of the languages you want to install. Press enter when you\'re done.');

                $installedLanguages = collect();

                do {
                    if (
                        $handle = suggest(
                            label: 'Handle of language',
                            options: fn($value) => collect(Locales::available())
                                ->filter(fn(string $language) => str_contains($language, $value) && !$installedLanguages->contains($language))
                                ->values()
                                ->toArray(),
                            validate: fn(string $value) => match (true) {
                                $value && !Locales::isAvailable($value) => 'Not supported by Laravel Lang.',
                                $value && $installedLanguages->contains($value) => 'Already installed.',
                                default => null,
                            },
                        )
                    ) {
                        $process = new Process(['php', 'artisan', 'lang:add', $handle]);
                        try {
                            $process->mustRun();
                            $installedLanguages->push($handle);
                            info("Language \"{$handle}\" installed.");
                        } catch (ProcessFailedException $exception) {
                            error($exception->getMessage());
                        }
                    }
                } while ($handle);
            } catch (ProcessFailedException $exception) {
                error($exception->getMessage());
            }
        }

        if (
            confirm(
                label: 'Would you like to star the Peak repo?',
                default: false,
            )
        ) {
            if (PHP_OS_FAMILY === 'Darwin') {
                exec('open https://github.com/studio1902/statamic-peak');
            }

            if (PHP_OS_FAMILY === 'Windows') {
                exec('start https://github.com/studio1902/statamic-peak');
            }

            if (PHP_OS_FAMILY === 'Linux') {
                exec('xdg-open https://github.com/studio1902/statamic-peak');
            }

            info('Thank you!');
        }

        info('<info>[✓] Peak is installed. Enjoy the view!</info>');
        warning('Run `php please peak:clear-site` to get rid of default content.');
        warning('Run `php please peak:install-preset` to install premade sets onto your website.');
        warning('Run `php please peak:install-block` to install premade blocks onto your page builder.');
    }
}
