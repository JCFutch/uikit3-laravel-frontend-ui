<?php

namespace cartographr\UIKit3Preset;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Laravel\Ui\AuthCommand;

class UIKit3PresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('uikit3', function ($command) {
            UIKit3Preset::install();

            $command->info('UIKit3 scaffolding installed successfully.');

            if ($command->option('auth')) {
                TailwindCssPreset::installAuth();

                $command->info('UIKit3 auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        Paginator::defaultView('pagination::default');

        Paginator::defaultSimpleView('pagination::simple-default');
    }
}
