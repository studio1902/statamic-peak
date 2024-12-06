<?php

use App\Console\Commands\PostInstall\CollectAvailableLangLocales;
use Facades\Statamic\Console\Processes\Composer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Laravel\Prompts\Prompt;
use Statamic\Support\Str;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Yaml\Yaml;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;
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

    protected string $sites = '';

    protected Collection $availableLanguages;

    protected bool $interactive = true;

    public function handle($console): void
    {
        $this->applyInteractivity($console);
        $this->loadFiles();
        $this->overwriteEnvWithPresets();
        $this->excludeBuildFolderFromGit();
        $this->excludeUsersFolderFromGit();
        $this->excludeFormsFolderFromGit();
        $this->setupComposerUpdateWorkflow();
        $this->installNodeDependencies();
        $this->installTranslations();
        $this->setLocale();
        $this->setTimezone();
        $this->runPeakClearSite();
        $this->writeFiles();
        $this->cleanUp();
        $this->starPeakRepo();
        $this->finish();
    }

    protected function applyInteractivity($console): void
    {
        $this->interactive = ! $console->option('no-interaction');

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
        $this->sites = app('files')->get(base_path('resources/sites.yaml'));
    }

    protected function overwriteEnvWithPresets(): void
    {
        if (! confirm(label: 'Do you want overwrite your `.env` file with the Peak presets?', default: true)) {
            return;
        }

        $this->setAppName();
        $this->setLicenseKey();
        $this->setAppUrl();
        $this->setAppKey();

        $this->useDebugbar();
        $this->useImagick();
        $this->setLocalMailer();

        info('[✓] `.env` file overwritten.');
    }

    protected function installNodeDependencies(): void
    {
        if (! confirm(label: 'Do you want to install npm dependencies?', default: true)) {
            return;
        }

        $this->run(
            command: 'npm i',
            processingMessage: 'Installing npm dependencies...',
            successMessage: 'npm dependencies installed.',
        );

        $this->installPuppeteerAndBrowsershot();
    }

    protected function installPuppeteerAndBrowsershot(): void
    {
        if (! confirm(label: 'Do you want to install Puppeteer and Browsershot for generating social images?', default: true)) {
            return;
        }

        $this->installPuppeteer();
        $this->installBrowsershot();
    }

    protected function installTranslations(): void
    {
        if (! confirm(label: 'Do you want to install missing Laravel translation files?', default: $this->interactive)) {
            return;
        }

        if (! $this->installLaravelLang()) {
            error('Could not install Laravel Lang.');

            return;
        }

        if (! $this->collectAvailableLanguages()) {
            error('Could not collect available languages.');

            return;
        }

        $this->selectLanguagesToInstall();
    }

    protected function setTimezone(): void
    {
        if (! $this->interactive || DIRECTORY_SEPARATOR === '\\') {
            return;
        }

        $newTimezone = search(
            label: 'What timezone should your app be in?',
            options: function (string $value) {
                if (! $value) {
                    return timezone_identifiers_list(DateTimeZone::ALL, null);
                }

                return collect(timezone_identifiers_list(DateTimeZone::ALL, null))
                    ->filter(fn (string $item) => Str::contains($item, $value, true))
                    ->values()
                    ->all();
            },
            placeholder: 'UTC',
            required: true,
        );

        $currentTimezone = config('app.timezone');

        $this->replaceInEnv("APP_TIMEZONE=\"$currentTimezone\"", "APP_TIMEZONE=\"$newTimezone\"");
        $this->replaceInReadme("APP_TIMEZONE=\"$currentTimezone\"", "APP_TIMEZONE=\"$newTimezone\"");
    }

    protected function setLocale(): void
    {
        $locale = text(
            label: 'What should be the default site locale?',
            placeholder: 'en_US',
            default: 'en_US',
            required: true,
        );

        $this->replaceInSites("locale: en_US", "locale: $locale");
    }

    protected function runPeakClearSite(): void
    {
        if (! $this->interactive || ! Process::isTtySupported() || ! Composer::isInstalled('studio1902/statamic-peak-commands')) {
            return;
        }

        $this->run(
            command: 'php artisan statamic:peak:clear-site',
            tty: true,
            spinner: false,
        );
    }

    protected function writeFiles(): void
    {
        $changelog = app('files')->get(__DIR__.'/CHANGELOG.md');

        app('files')->put(base_path('.env'), $this->env);
        app('files')->put(base_path('CHANGELOG.md'), $changelog);
        app('files')->put(base_path('README.md'), $this->readme);
        app('files')->put(base_path('config/app.php'), $this->app);
        app('files')->put(base_path('resources/sites.yaml'), $this->sites);
    }

    protected function cleanUp(): void
    {
        app('files')->exists(base_path('tailwind.config.js')) && app('files')->delete(base_path('tailwind.config.js'));

        $this->withSpinner(
            fn () => $this->cleanUpComposerPackages(),
            'Cleaning up composer packages...',
            'Composer packages cleaned up.'
        );

        $this->withSpinner(
            fn () => $this->removePostInstallCommands(),
            'Removing post install commands...',
            'Post install commands removed.'
        );
    }

    protected function starPeakRepo(): void
    {
        if (! confirm(label: 'Would you like to star the Peak repo?', default: false)) {
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

        if (! Composer::isInstalled('studio1902/statamic-peak-commands')) {
            info("Consider buying the Peak Commands addon containing a set of CLI commands to make tedious and recurring tasks a lot easier.");
            warning("Read more here: https://peak.1902.studio/getting-started/commands.html#add-collection");

            return;
        }

        info("Thank you for install the Peak Commands addon.\n* Run `php please peak:install-preset` to install premade sets onto your website.\n* Run `php please peak:install-block` to install premade blocks onto your page builder.\n* Learn about more commands here: https://peak.1902.studio/getting-started/commands.html");
        warning("You need a valid license to use these commands.\nBuy one here: https://statamic.com/addons/studio1902/peak-commands");
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

    protected function setLicenseKey(): void
    {
        $licenseKey = text(
            label: 'Enter your Statamic License key',
            hint: 'Leave empty to skip',
            default: $this->interactive ? '' : 'Statamic Peak',
            required: false,
        );

        $this->replaceInEnv('STATAMIC_LICENSE_KEY=', "STATAMIC_LICENSE_KEY=\"{$licenseKey}\"");
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
        if (! confirm(label: 'Do you want use Imagick as an image processor instead of GD?', default: true)) {
            return;
        }

        $this->replaceInEnv('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick');
        $this->replaceInReadme('#IMAGE_MANIPULATION_DRIVER=imagick', 'IMAGE_MANIPULATION_DRIVER=imagick');
    }

    protected function setLocalMailer(): void
    {
        $localMailer = select(
            label: 'Which local mailer do you use?',
            options: [
                'helo' => 'Helo',
                'herd' => 'Herd Pro',
                'log' => 'Log',
                'mailpit' => 'Mailpit',
                'mailtrap' => 'Mailtrap',
            ],
            default: 'herd',
            scroll: 10
        );

        if ($localMailer === 'mailpit') {
            return;
        }

        if ($localMailer === 'helo' || $localMailer === 'herd') {
            $this->replaceInEnv('MAIL_HOST=localhost', 'MAIL_HOST=127.0.0.1');
            $this->replaceInEnv('MAIL_PORT=1025', 'MAIL_PORT=2525');
            $this->replaceInEnv('MAIL_USERNAME=null', 'MAIL_USERNAME="${APP_NAME}"');
        }

        if ($localMailer === 'mailhog') {
            $this->replaceInEnv('MAIL_HOST=localhost', 'MAIL_HOST=127.0.0.1');
            $this->replaceInEnv('MAIL_PORT=1025', 'MAIL_PORT=8025');
        }

        if ($localMailer === 'log') {
            $this->replaceInEnv('MAIL_MAILER=smtp', 'MAIL_MAILER=log');
            echo 'log';
        }
    }

    protected function excludeBuildFolderFromGit(): void
    {
        if (! confirm(label: 'Do you want to exclude the `public/build` folder from git?', default: true)) {
            return;
        }

        $this->appendToGitignore('/public/build/');
    }

    protected function excludeUsersFolderFromGit(): void
    {
        if (! confirm(label: 'Do you want to exclude the `users` folder from git?', default: false)) {
            return;
        }

        $this->appendToGitignore('/users');
    }

    protected function excludeFormsFolderFromGit(): void
    {
        if (! confirm(label: 'Do you want to exclude the `storage/form` folder from git?', default: false)) {
            return;
        }

        $this->appendToGitignore('/storage/forms');
    }

    protected function setupComposerUpdateWorkflow(): void
    {
        if (! confirm(label: 'Do you want to add a GitHub workflow that does PR\'s with updates?', default: true)) {
            return;
        }

        $cron = select(
            label: 'How often do you want this workflow to automatically run?',
            options: [
                '0 2 * * 1' => 'Every week',
                '0 2 1 * *' => 'Every month',
                '0 2 1 */3 *' => 'Every three months',
                false => 'Never, I\'ll trigger it manually',
            ],
            default: '0 2 1 */3 *',
        );

        $cron
         ? $on = [
            'schedule' => [
                0 => [
                    'cron' => "$cron",
                ],
            ],
            'workflow_dispatch' => NULL,
        ]
        : $on = [
            'workflow_dispatch' => NULL,
        ];

        $workflow = [
            'name' => 'Composer Update',
            'on' => $on,
            'jobs' => [
                'composer_update_job' => [
                    'runs-on' => 'ubuntu-latest',
                    'name' => 'composer update',
                    'steps' => [
                        0 => [
                            'name' => 'Checkout',
                            'uses' => 'actions/checkout@v3',
                        ],
                        1 => [
                            'name' => 'composer update action',
                            'uses' => 'kawax/composer-update-action@master',
                            'env' => [
                            'GITHUB_TOKEN' => '${{ secrets.GITHUB_TOKEN }}',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $disk = Storage::build([
            'driver' => 'local',
            'root' => base_path(),
        ]);

        $disk->makeDirectory('.github/workflows');
        $disk->put('.github/workflows/composer_update.yaml', Yaml::dump($workflow, 99, 2));
    }

    protected function run(string $command, string $processingMessage = '', string $successMessage = '', ?string $errorMessage = null, bool $tty = false, bool $spinner = true, int $timeout = 120): bool
    {
        $process = new Process(explode(' ', $command));
        $process->setTimeout($timeout);

        if ($tty) {
            $process->setTty(true);
        }

        try {
            $spinner ?
                $this->withSpinner(
                    fn () => $process->mustRun(),
                    $processingMessage,
                    $successMessage
                ) :
                $this->withoutSpinner(
                    fn () => $process->mustRun(),
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
            timeout: 240,
        );
    }

    protected function installBrowsershot(): void
    {
        $this->run(
            command: 'composer require spatie/browsershot',
            processingMessage: 'Installing Browsershot...',
            successMessage: 'Browsershot installed.',
        );

        $this->run(
            command: 'composer require spatie/image',
            processingMessage: 'Installing Image...',
            successMessage: 'Image installed.',
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

    protected function replaceInSites(string $search, string $replace): void
    {
        $this->sites = str_replace($search, $replace, $this->sites);
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

    protected function withoutSpinner(callable $callback, string $successMessage = ''): void
    {
        $callback();

        if ($successMessage) {
            info("[✓] $successMessage");
        }
    }

    protected function selectLanguageToInstall(Collection $installedLanguages): string
    {
        return suggest(
            label: 'Handle of language (submit empty when you\'re done)',
            options: fn ($value) => $this->availableLanguages
                ->filter(fn (string $language) => Str::contains($language, $value, true) && ! $installedLanguages->contains($language))
                ->values()
                ->toArray(),
            placeholder: 'en',
            validate: fn (string $value) => match (true) {
                $value && ! $this->availableLanguages->contains($value) => 'Not supported by Laravel Lang.',
                $value && $installedLanguages->contains($value) => "Language \"{$value}\" already installed.",
                default => null,
            },
            hint: $installedLanguages->isNotEmpty() ? 'Installed: '.$installedLanguages->join(', ', ' and ') : '',
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
