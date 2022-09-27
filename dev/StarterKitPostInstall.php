<?php

use Illuminate\Support\Facades\Artisan;

class StarterKitPostInstall
{
    public function handle($console)
    {
        Artisan::call('statamic:peak:clear-site');

        if ($console->confirm('Do you want overwrite your .env file with the Peak presets?')) {
            // do stuff
        }

        if ($console->confirm('Do you want to exclude users from git?')) {
            // do stuff
        }

        if ($console->confirm('Do you want to exclude form entries from git?')) {
            // do stuff
        }

        if ($console->confirm('Enjoying the view? Would you like to show some love by starring the repo?')) {
            if(PHP_OS_FAMILY == 'Darwin') exec('open https://github.com/studio1902/statamic-peak');
            if(PHP_OS_FAMILY == 'Windows') exec('start https://github.com/studio1902/statamic-peak');
            if(PHP_OS_FAMILY == 'Linux') exec('xdg-open https://github.com/studio1902/statamic-peak');

            $console->line('Thank you!');
        }
    }
}
