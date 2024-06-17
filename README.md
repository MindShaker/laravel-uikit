# UIkit / Breeze starter template for Laravel 11

This package installs the starter kit "[Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze-installation)" and styles it with [UiKit](https://getuikit.com/) and it removes unnecessary files from Breeze and tailwind (See the full list of deleted / changed files below).

Laravel Breeze is a minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation. 

## Getting Started

### Prerequisites

To begin, you'll need a **fresh** install of Laravel. **Adding this to an 
existing project is not recommended and may cause issues**. For full 
instructions on installing Laravel, refer to the 
[Laravel installation docs](https://laravel.com/docs/11.x/installation), but 
something like the following will get you up and running:

```
composer create-project laravel/laravel example-app

cd example-app
```

### Installing

1. Include this repository into your composer dependencies:
```
composer require mindshaker/laravel-uikit
```

2. Run the artisan command to install Breeze and UIKit (This will delete / change files. Please see full list below.)
```
php artisan uikit:install
```

3. Finish the Breeze installation
```
php artisan migrate

npm install
```

## Full list of deleted / Changed files after install
The delete files are files that we don't need, ex: tailwind because we use UiKit.

### Deleted Files
* app/Http/Controllers/ProfileController.php
* resources/views/components/
* resources/views/profile/
* resources/css/
* resources/views/layouts/navigation.blade.php
* resources/js/bootstrap
* postcss.config.js
* tailwind.config.js

### Changed Files
* resources/views/welcome.blade.php
* resources/views/dashboard.blade.php
* resources/views/layouts/app.blade.php
* resources/views/welcome.blade.php
* resources/js/app.js
* resources/views/auth/
* package.json (Add packages and remove extra ones.)
* vite.config.js


## Next Steps
* Profile

This project was made to accommodate our laravel Setup, yours might not be the same.

## License

This template is open-source software licensed under the 
[MIT license](https://opensource.org/licenses/MIT) - see the 
[LICENSE.md](LICENSE.md) file for details
