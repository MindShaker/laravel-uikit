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
        if (!$this->requireComposerPackages(['laravel/breeze'], true)) {
            return 1;
        }

        $this->components->info('Installing Breeze...');
        if ($this->option('inertia')) {
            $this->runCommands(['php artisan breeze:install react']);
        } else {
            $this->runCommands(['php artisan breeze:install blade']);
        }

        if ($this->option('debugbar')) {
            $this->components->info('Installing Debugbar...');
            if (!$this->requireComposerPackages(['barryvdh/laravel-debugbar'], true)) {
                return 1;
            }
        }

        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            unset($packages['alpinejs']);
            unset($packages['@tailwindcss/forms']);
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

        //Copy files
        if ($this->option('robots')) {
            copy(__DIR__ . '/../../robots.txt', base_path('public/robots.txt'));
        }
        copy(__DIR__ . '/../../resources/sass/app.scss', resource_path('sass/app.scss'));


        //Copy Directories
        //auth
        //layouts

        if ($this->option('inertia')) {
            //Install Inertia
            $this->installInertia();
        } else {
            //Install Blade
            $this->installBlade();
        }


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

    protected function installBlade()
    {
        // Layouts...
        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../app/View/Components', app_path('View/Components'));

        //Create Folders
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));

        //Copy files
        copy(__DIR__ . '/../../vite.config.js', base_path('vite.config.js'));
        copy(__DIR__ . '/../../resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/../../resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
        copy(__DIR__ . '/../../resources/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));
        copy(__DIR__ . '/../../resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));

        //Copy Directories
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/views/auth', resource_path('views/auth'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/views/pagination', resource_path('views/pagination'));
    }

    protected function installInertia()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Components'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/js/Components', resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/js/Pages', resource_path('js/Pages'));

        copy(__DIR__ . '/../../resources/js/app.jsx', resource_path('js/app.jsx'));
    }

    public function deleteUnnecessaryFiles(): void
    {

        $this->deleteDir((string) app_path('Http/Controllers/ProfileController.php'));
        $this->deleteDir((string) resource_path('css'));

        $this->deleteFile((string) base_path('postcss.config.js'));
        $this->deleteFile((string) base_path('tailwind.config.js'));

        if ($this->option('inertia')) {
            $this->deleteFile((string) resource_path('js/Components/DangerButton.jsx'));
            $this->deleteFile((string) resource_path('js/Components/InputLabel.jsx'));
            $this->deleteFile((string) resource_path('js/Components/NavLink.jsx'));
            $this->deleteFile((string) resource_path('js/Components/PrimaryButton.jsx'));
            $this->deleteFile((string) resource_path('js/Components/ResponsiveNavLink.jsx'));
            $this->deleteFile((string) resource_path('js/Components/SecondaryButton.jsx'));
            $this->deleteDir((string) resource_path('js/Pages/Profile'));
        } else {
            $this->deleteDir((string) resource_path('views/components'));
            $this->deleteDir((string) resource_path('views/profile'));
            $this->deleteFile((string) resource_path('js/bootstrap.js'));
            $this->deleteFile((string) resource_path('views/layouts/navigation.blade.php'));
        }
        //$this->deleteFile((string) resource_path('views/dashboard.blade.php'));

    }
}
