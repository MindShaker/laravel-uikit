<x-guest-layout>
    <!-- Error Alerts -->
    @if( count($errors) > 0 )
    <div class="uk-margin">
        @foreach( $errors->all() as $message )
        <div class="uk-alert-warning" uk-alert>
            <p>{{$message}}</p>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Success Alerts -->
    @if (session('status'))
    <div class="uk-margin">
        <div class="uk-alert-success" uk-alert>
            <p>{{session('status')}}</p>
        </div>
    </div>
    @endif
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input class="uk-input" id="name" name="email" type="email" placeholder="Email" required="required">
            </div>
        </div>

        <!-- Password -->
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input" id="password" name="password" type="password" placeholder="Password" required="required">
            </div>
        </div>

        <div class="uk-margin">
            <label><input class="uk-checkbox" id="remember_me" name="remember" type="checkbox"> {{ __('Remember me') }}</label>
        </div>

        <div class="uk-flex uk-flex-middle uk-grid-small">
            <div class="uk-width-expand uk-text-right">
                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
            </div>
            <div class="uk-width-auto">
                <button class="uk-button uk-button-primary">{{ __('Log in') }}</button>
            </div>
        </div>
    </form>
</x-guest-layout>