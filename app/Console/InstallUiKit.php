<?php

namespace Mindshaker\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallUiKit
{
    /**
     * Install the Blade Breeze stack.
     *
     * @return int|null
     */
    protected function installUikit()
    {

        $this->line('');
        $this->components->info('Require Breeze scaffolding...');
        if (!$this->requireComposerPackages(['laravel/breeze'])) {
            return 1;
        }

        $this->components->info('Install Breeze...');
        $this->runCommands(['php artisan breeze:install']);


        // Layouts...
        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../app/View/Components', app_path('View/Components'));

        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            unset($packages['alpinejs']);
            unset($packages['@tailwindcss/forms']);
            unset($packages['axios']);
            unset($packages['postcss']);
            unset($packages['tailwindcss']);

            return [
                'sass' => 'latest',
                'uikit' => 'latest'
            ] + $packages;
        });

        //Delete unnecessary files
        $this->deleteUnnecessaryFiles();

        //Create Folders
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));

        //Copy files
        copy(__DIR__ . '/../../vite.config.js', base_path('vite.config.js'));
        copy(__DIR__ . '/../../resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/../../resources/sass/app.scss', resource_path('sass/app.scss'));
        copy(__DIR__ . '/../../resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
        copy(__DIR__ . '/../../resources/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));
        copy(__DIR__ . '/../../resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));


        //Copy Directories
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/views/pagination', resource_path('views/pagination'));

        $this->components->info('Installing and building Node dependencies.');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('UiKit scaffolding installed successfully.');
    }

    public function deleteUnnecessaryFiles(): void
    {

        $this->deleteDir((string) app_path('Http/Controllers/ProfileController.php'));

        $this->deleteDir((string) resource_path('views/components'));
        $this->deleteDir((string) resource_path('views/profile'));
        $this->deleteDir((string) resource_path('css'));

        //$this->deleteFile((string) resource_path('views/dashboard.blade.php'));
        $this->deleteFile((string) resource_path('views/layouts/navigation.blade.php'));

        $this->deleteFile((string) resource_path('js/bootstrap.js'));
        $this->deleteFile((string) base_path('postcss.config.js'));
        $this->deleteFile((string) base_path('tailwind.config.js'));
    }
}
