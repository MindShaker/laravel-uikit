<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @vite(['resources/sass/app.scss'])
</head>

<body>
    <div id="app" class="uk-section-muted">
        <div class="uk-dark uk-box-shadow-medium uk-section-default">
            <nav class="uk-navbar-container uk-navbar-transparent ">
                <div class="uk-container uk-container-large">
                    <div class="uk-navbar" data-uk-navbar>
                        <div class="uk-navbar-left">
                            <a class="uk-navbar-item uk-logo" href="/">{{ config('app.name', 'Laravel') }}</a>

                            <ul class="uk-navbar-nav uk-tab">
                                <li @class(['uk-active' => Request::routeIs('welcome')])>
                                    <a href="/">Home</a>
                                </li>
                            </ul>
                        </div>
                        <div class="uk-navbar-right">
                            <ul class="uk-navbar-nav">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li>
                                            <a href="{{ route('login') }}">{{ __('Log In') }}</a>
                                        </li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a href="#">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="uk-padding-small uk-border-rounded"
                                            uk-dropdown="offset: -20; pos: bottom-right; animation: slide-top; animate-out:true">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Log Out') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <main data-uk-height-viewport="expand: true">
            {{ $slot }}
        </main>

        <footer class="uk-section uk-section-xsmall uk-section-secondary">
            <div class="uk-container uk-container-large">
                <div class="uk-flex uk-flex-center">
                    <span>{{ env('APP_NAME') }} | Powered by <a class="" href="http://mindshaker.com" target="_blank">Mindshaker</a>. © 2024 All rights reserved.</span>
                </div>
            </div>
        </footer>
    </div>
    @vite(['resources/js/app.js'])
</body>

</html>
