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
    
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="uk-margin">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Password -->
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input class="uk-input" id="password" name="password" type="password" placeholder="Password" required="required">
            </div>
        </div>

        <button class="uk-button uk-button-primary uk-width-1-1">{{ __('Confirm') }}</button>
    </form>
</x-guest-layout>