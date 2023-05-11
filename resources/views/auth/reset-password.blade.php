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
    @else
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input class="uk-input" id="name" name="email" type="email" placeholder="Email" required="required" :value="old('email', $request->email)">
                </div>
            </div>

            <!-- Password -->
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" id="password" name="password" type="password" placeholder="Password" required="required">
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password" required="required">
                </div>
            </div>

            <button class="uk-button uk-button-primary uk-width-1-1">{{ __('Reset Password') }}</button>
        </form>
    @endif
</x-guest-layout>