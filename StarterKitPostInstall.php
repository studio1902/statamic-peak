<?php

use LaravelLang\Publisher\Facades\Helpers\Locales;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\suggest;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;


class StarterKitPostInstall
{
    protected string $env = '';
    protected string $readme = '';

    public function handle(): void
    {
        $this->overwriteEnvWithPresets();
        $this->initializeGitAndConfigureGitignore();
        $this->installNodeDependencies();
        $this->installPuppeteerAndBrowsershot();
        $this->installTranslations();
        $this->starPeakRepo();
        $this->finish();
    }

    protected function overwriteEnvWithPresets(): void
    {
        if (!confirm(label: 'Do you want overwrite your `.env` file with the Peak presets?', default: true,)) {
            return;
        }

        $this->loadPresetEnvAndReadme();

        $this->setAppName();
        $this->setAppUrl();
        $this->setAppKey();

        $this->useDebugbar();
        $this->useImagick();
        $this->enableSaveCachedImages();

        $this->writeEnvAndReadme();
    }

    protected function initializeGitAndConfigureGitignore(): void
    {
        if (!confirm(label: 'Do you want to init a git repo and configure gitignore?', default: true,)) {
            return;
        }

        $this->initializeGitRepo();

        $this->excludeBuildFolderFromGit();
        $this->excludeUsersFolderFromGit();
        $this->excludeFormsFolderFromGit();
    }

    protected function installNodeDependencies(): void
    {
        if (!confirm(label: 'Do you want to install npm dependencies?', default: true,)) {
            return;
        }

        $this->run(
            command: 'npm i',
            successMessage: 'npm dependencies installed.',
            processingMessage: 'Installing npm dependencies...',
        );
    }

    protected function installPuppeteerAndBrowsershot(): void
    {
        if (!confirm(label: 'Do you want to `npm i puppeteer` and `composer require spatie/browsershot` for generating social images?', default: true,)) {
            return;
        }

        $this->installPuppeteer();
        $this->installBrowsershot();
    }

    protected function installTranslations(): void
    {
        if (!confirm(label: 'Do you want to install missing Laravel translation files using the Laravel Lang package?', default: true,)) {
            return;
        }

        if (!$this->installLaravelLang()) {
            return;
        }

        $this->selectLanguagesToInstall();
    }

    protected function starPeakRepo(): void
    {
        if (!confirm(label: 'Would you like to star the Peak repo?', default: false,)) {
            return;
        }

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

    protected function finish(): void
    {
        info('[✓] Peak is installed. Enjoy the view!');
        warning('Run `php please peak:clear-site` to get rid of default content.');
        warning('Run `php please peak:install-preset` to install premade sets onto your website.');
        warning('Run `php please peak:install-block` to install premade blocks onto your page builder.');
    }

    protected function loadPresetEnvAndReadme(): void
    {
        $this->env = app('files')->get(base_path('.env.example'));
        $this->readme = app('files')->get(base_path('README.md'));
    }

    protected function setAppName(): void
    {
        $appName = text(
            label: 'What should be your app name?',
            placeholder: 'Statamic Peak',
            required: true,
        );

        $appName = preg_replace('/([\'|\"|#])/m', '', $appName);

        $this->replaceInEnv('APP_NAME="Statamic Peak"', "APP_NAME=\"{$appName}\"");
        $this->replaceInReadme('APP_NAME="Statamic Peak"', "APP_NAME=\"{$appName}\"");
    }

    protected function setAppUrl(): void
    {
        $appUrl = env('APP_URL');

        $this->replaceInEnv('APP_URL=', "APP_URL=\"{$appUrl}\"");
    }

    protected function setAppKey(): void
    {
        $appKey = env('APP_KEY');

        $this->replaceInEnv('APP_KEY=', "APP_KEY=\"{$appKey}\"");
        $this->replaceInReadme('APP_KEY=', "APP_KEY=\"{$appKey}\"");
    }

    protected function useDebugbar(): void
    {
        if (confirm(label: 'Do you want to use the debugbar?', default: false,)) {
            return;
        }

        $this->replaceInEnv('DEBUGBAR_ENABLED=true', 'DEBUGBAR_ENABLED=false');
    }

    protected function useImagick(): void
    {
        if (!confirm(label: 'Do you want use Imagick as an image processor instead of GD?', default: true,)) {
            return;
        }

        $this->replaceInEnv('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick');
        $this->replaceInReadme('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick');
    }

    protected function enableSaveCachedImages(): void
    {
        if (!confirm(label: 'Do you want to enable `SAVE_CACHED_IMAGES` (slower initial page load)?', default: false,)) {
            return;
        }

        $this->replaceInEnv('SAVE_CACHED_IMAGES=false', 'SAVE_CACHED_IMAGES=true');
        $this->replaceInReadme('SAVE_CACHED_IMAGES=false', 'SAVE_CACHED_IMAGES=true');
    }

    protected function writeEnvAndReadme(): void
    {
        app('files')->put(base_path('.env'), $this->env);
        app('files')->put(base_path('README.md'), $this->readme);
    }

    protected function initializeGitRepo(): void
    {
        $this->run(
            command: 'git init',
            successMessage: 'Repo initialised.',
            processingMessage: 'Initialising repo...'
        );
    }

    protected function excludeBuildFolderFromGit(): void
    {
        if (!confirm(label: 'Do you want to exclude the `public/build` folder from git?', default: true,)) {
            return;
        }

        $this->appendToGitignore('/public/build/');
    }

    protected function excludeUsersFolderFromGit(): void
    {
        if (!confirm(label: 'Do you want to exclude the `users` folder from git?', default: false,)) {
            return;
        }

        $this->appendToGitignore('/users');
    }

    protected function excludeFormsFolderFromGit(): void
    {
        if (!confirm(label: 'Do you want to exclude the `storage/form` folder from git?', default: false,)) {
            return;
        }

        $this->appendToGitignore('/storage/forms');
    }

    protected function run(string $command, string $successMessage, string $processingMessage): bool
    {
        $process = new Process(explode(' ', $command));
        try {
            spin(fn() => $process->mustRun(), $processingMessage);

            info("[✓] {$successMessage}");

            return true;
        } catch (ProcessFailedException $exception) {
            error($exception->getMessage());

            return false;
        }
    }

    protected function installPuppeteer(): void
    {
        $this->run(
            command: 'npm i puppeteer',
            successMessage: 'Puppeteer installed.',
            processingMessage: 'Installing Puppeteer...',
        );
    }

    protected function installBrowsershot(): void
    {
        $this->run(
            command: 'composer require spatie/browsershot',
            successMessage: 'Browsershot installed.',
            processingMessage: 'Installing Browsershot...',
        );
    }

    protected function installLaravelLang(): bool
    {
        return $this->run(
            command: 'composer require laravel-lang/common --dev',
            successMessage: 'Laravel Lang installed.',
            processingMessage: 'Installing Laravel Lang...',
        );
    }

    protected function selectLanguagesToInstall(): void
    {
        info('Enter the handles of the languages you want to install. Press enter when you\'re done.');

        $installedLanguages = collect();

        do {
            if (($handle = $this->selectLanguageToInstall($installedLanguages)) && $this->installLanguage($handle)) {
                $installedLanguages->push($handle);
            }
        } while ($handle);
    }

    protected function replaceInEnv(string $search, string $replace): void
    {
        $this->env = str_replace($search, $replace, $this->env);
    }

    protected function replaceInReadme(string $search, string $replace): void
    {
        $this->readme = str_replace($search, $replace, $this->readme);
    }

    protected function appendToGitignore(string $toIgnore): void
    {
        app('files')->append(base_path('.gitignore'), "\n{$toIgnore}");
    }

    protected function selectLanguageToInstall(\Illuminate\Support\Collection $installedLanguages): string
    {
        return suggest(
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
        );
    }

    protected function installLanguage(string $handle): bool
    {
        return $this->run("php artisan lang:add {$handle}", "Language \"{$handle}\" installed.", "Installing language \"{$handle}\"...");
    }
}
