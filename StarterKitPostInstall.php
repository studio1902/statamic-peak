<?php

use App\Console\Commands\PostInstall\CollectAvailableLangLocales;
use Facades\Statamic\Console\Processes\Composer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Laravel\Prompts\Prompt;
use Statamic\Support\Str;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\Process;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\search;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\suggest;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;


class StarterKitPostInstall
{
    public $registerCommands = [
        CollectAvailableLangLocales::class,
    ];

    protected string $env = '';
    protected string $readme = '';
    protected string $app = '';
    protected Collection $availableLanguages;
    protected bool $interactive = true;

    public function handle($console): void
    {
        $this->applyInteractivity($console);
        $this->loadFiles();
        $this->overwriteEnvWithPresets();
        $this->initializeGitAndConfigureGitignore();
        $this->installNodeDependencies();
        $this->installPuppeteerAndBrowsershot();
        $this->installTranslations();
        $this->setTimezone();
        $this->writeFiles();
        $this->cleanUp();
        $this->starPeakRepo();
        $this->finish();
    }

    protected function applyInteractivity($console): void
    {
        $this->interactive = !$console->option('no-interaction');

        /**
         * Interactivity should be inherited but seems like there is a bug in Prompts where it stays
         * without interaction when a command was run before with `--no-interaction` flag.
         */
        Prompt::interactive($this->interactive);
    }

    protected function loadFiles(): void
    {
        $this->env = app('files')->get(base_path('.env.example'));
        $this->readme = app('files')->get(base_path('README.md'));
        $this->app = app('files')->get(base_path('config/app.php'));
    }

    protected function overwriteEnvWithPresets(): void
    {
        if (!confirm(label: 'Do you want overwrite your `.env` file with the Peak presets?', default: true)) {
            return;
        }

        $this->setAppName();
        $this->setAppUrl();
        $this->setAppKey();

        $this->useDebugbar();
        $this->useImagick();

        info("[✓] `.env` file overwritten.");
    }

    protected function initializeGitAndConfigureGitignore(): void
    {
        if (!confirm(label: 'Do you want to init a git repo and configure gitignore?', default: true)) {
            return;
        }

        $this->initializeGitRepo();

        $this->excludeBuildFolderFromGit();
        $this->excludeUsersFolderFromGit();
        $this->excludeFormsFolderFromGit();
        $this->createGithubRepo();
    }

    protected function installNodeDependencies(): void
    {
        if (!confirm(label: 'Do you want to install npm dependencies?', default: true)) {
            return;
        }

        $this->run(
            command: 'npm i',
            processingMessage: 'Installing npm dependencies...',
            successMessage: 'npm dependencies installed.',
        );
    }

    protected function installPuppeteerAndBrowsershot(): void
    {
        if (!confirm(label: 'Do you want to `npm i puppeteer` and `composer require spatie/browsershot` for generating social images?', default: true)) {
            return;
        }

        $this->installPuppeteer();
        $this->installBrowsershot();
    }

    protected function installTranslations(): void
    {
        if (!confirm(label: 'Do you want to install missing Laravel translation files using the Laravel Lang package?', default: $this->interactive)) {
            return;
        }

        if (!$this->installLaravelLang()) {
            error('Could not install Laravel Lang.');
            return;
        }

        if (!$this->collectAvailableLanguages()) {
            error('Could not collect available languages.');
            return;
        }

        $this->selectLanguagesToInstall();
    }

    protected function setTimezone(): void
    {
        if (!$this->interactive) {
            return;
        }

        $newTimezone = search(
            label: 'What timezone should your app be in?',
            options: function (string $value) {
                if (!$value) {
                    return timezone_identifiers_list(DateTimeZone::ALL, null);
                }

                return collect(timezone_identifiers_list(DateTimeZone::ALL, null))
                    ->filter(fn(string $item) => Str::contains($item, $value, true))
                    ->values()
                    ->all();
            },
            placeholder: 'UTC',
            required: true,
        );


        $currentTimezone = config('app.timezone');

        $this->replaceInApp("'timezone' => '{$currentTimezone}'", "'timezone' => '{$newTimezone}'");
    }

    protected function writeFiles(): void
    {
        app('files')->put(base_path('.env'), $this->env);
        app('files')->put(base_path('README.md'), $this->readme);
        app('files')->put(base_path('config/app.php'), $this->app);
    }

    protected function cleanUp(): void
    {
        $this->withSpinner(
            fn() => $this->cleanUpComposerPackages(),
            'Cleaning up composer packages...',
            'Composer packages cleaned up.'
        );

        $this->withSpinner(
            fn() => $this->removePostInstallCommands(),
            'Removing post install commands...',
            'Post install commands removed.'
        );
    }

    protected function starPeakRepo(): void
    {
        if (!confirm(label: 'Would you like to star the Peak repo?', default: false)) {
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

    protected function setAppName(): void
    {
        $appName = text(
            label: 'What should be your app name?',
            placeholder: 'Statamic Peak',
            default: $this->interactive ? '' : 'Statamic Peak',
            required: true,
        );

        $appName = preg_replace('/([\'|\"#])/m', '', $appName);

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
        if (confirm(label: 'Do you want to use the debugbar?', default: false)) {
            return;
        }

        $this->replaceInEnv('DEBUGBAR_ENABLED=true', 'DEBUGBAR_ENABLED=false');
    }

    protected function useImagick(): void
    {
        if (!confirm(label: 'Do you want use Imagick as an image processor instead of GD?', default: true)) {
            return;
        }

        $this->replaceInEnv('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick');
        $this->replaceInReadme('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick');
    }

    protected function initializeGitRepo(): void
    {
        $this->run(
            command: 'git init',
            processingMessage: 'Initialising repo...',
            successMessage: 'Repo initialised.'
        );
    }

    protected function excludeBuildFolderFromGit(): void
    {
        if (!confirm(label: 'Do you want to exclude the `public/build` folder from git?', default: true)) {
            return;
        }

        $this->appendToGitignore('/public/build/');
    }

    protected function excludeUsersFolderFromGit(): void
    {
        if (!confirm(label: 'Do you want to exclude the `users` folder from git?', default: false)) {
            return;
        }

        $this->appendToGitignore('/users');
    }

    protected function excludeFormsFolderFromGit(): void
    {
        if (!confirm(label: 'Do you want to exclude the `storage/form` folder from git?', default: false)) {
            return;
        }

        $this->appendToGitignore('/storage/forms');
    }

    protected function createGithubRepo(): void
    {
        if (!app(ExecutableFinder::class)->find('gh')) {
            info('If you install GitHub CLI, next time this installer will be able to set up a remote repository.');
            return;
        }

        if (!confirm(label: 'Do you want create a repo on Github?', default: false)) {
            return;
        }

        $name = text(
            label: 'What should be your full repository name?',
            placeholder: 'studio1902/statamic-peak',
            required: true,
        );

        $flags = '--source=.';
        confirm(label: 'Should this be a private repository?', default: true) ? $flags .= ' --private' : $flags .= ' --public';

        $this->run(
            command: "gh repo create $name $flags",
            processingMessage: 'Creating remote repository...',
            successMessage: 'Remove repository created.'
        );
    }

    protected function run(string $command, string $processingMessage = '', string $successMessage = '', ?string $errorMessage = null): bool
    {
        $process = new Process(explode(' ', $command));
        $process->setTimeout(120);

        try {
            $this->withSpinner(
                fn() => $process->mustRun(),
                $processingMessage,
                $successMessage
            );

            return true;
        } catch (ProcessFailedException $exception) {
            error($errorMessage ?? $exception->getMessage());

            return false;
        }
    }

    protected function installPuppeteer(): void
    {
        $this->run(
            command: 'npm i puppeteer',
            processingMessage: 'Installing Puppeteer...',
            successMessage: 'Puppeteer installed.',
        );
    }

    protected function installBrowsershot(): void
    {
        $this->run(
            command: 'composer require spatie/browsershot',
            processingMessage: 'Installing Browsershot...',
            successMessage: 'Browsershot installed.',
        );
    }

    protected function installLaravelLang(): bool
    {
        return $this->run(
            command: 'composer require laravel-lang/common --dev',
            processingMessage: 'Installing Laravel Lang...',
            successMessage: 'Laravel Lang installed.',
        );
    }

    protected function collectAvailableLanguages(): bool
    {
        $command = 'php artisan statamic:peak:collect-available-lang-locales';
        $process = new Process(explode(' ', $command));

        try {
            $process->mustRun();
            $this->availableLanguages = collect(json_decode($process->getOutput(), true, 512, JSON_THROW_ON_ERROR));
            return true;
        } catch (Exception) {
            return false;
        }
    }

    protected function selectLanguagesToInstall(): void
    {
        info('Enter the handles of the languages you want to install. Leave empty and press enter when you\'re done.');

        $installedLanguages = collect();

        do {
            if (($handle = $this->selectLanguageToInstall($installedLanguages)) && $this->installLanguage($handle)) {
                $installedLanguages->push($handle);
            }
        } while ($handle);
    }

    protected function replaceInApp(string $search, string $replace): void
    {
        $this->app = str_replace($search, $replace, $this->app);
    }

    protected function withSpinner(callable $callback, string $processingMessage = '', string $successMessage = ''): void
    {
        spin($callback, $processingMessage);

        if ($successMessage) {
            info("[✓] $successMessage");
        }
    }

    protected function cleanUpComposerPackages(): void
    {
        if ($packages = []) {
            Composer::removeMultiple($packages);
        }

        if ($devPackages = ['laravel-lang/common']) {
            Composer::removeMultipleDev($devPackages);
        }
    }

    protected function removePostInstallCommands(): void
    {
        Storage::build([
            'driver' => 'local',
            'root' => app_path(),
        ])->deleteDirectory('Console/Commands/PostInstall');

        usleep(500000);
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

    protected function selectLanguageToInstall(Collection $installedLanguages): string
    {
        return suggest(
            label: 'Handle of language (submit empty when you\'re done)',
            options: fn($value) => $this->availableLanguages
                ->filter(fn(string $language) => Str::contains($language, $value, true) && !$installedLanguages->contains($language))
                ->values()
                ->toArray(),
            placeholder: 'en',
            validate: fn(string $value) => match (true) {
                $value && !$this->availableLanguages->contains($value) => 'Not supported by Laravel Lang.',
                $value && $installedLanguages->contains($value) => "Language \"{$value}\" already installed.",
                default => null,
            },
            hint: $installedLanguages->isNotEmpty() ? 'Installed: ' . $installedLanguages->join(', ', ' and ') : '',
        );
    }

    protected function installLanguage(string $handle): bool
    {
        return $this->run(
            command: "php artisan lang:add {$handle}",
            processingMessage: "Installing language \"{$handle}\"...",
            successMessage: "Language \"{$handle}\" installed.",
            errorMessage: "Installation of language \"{$handle}\" failed."
        );
    }
}
