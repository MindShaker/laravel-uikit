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
    @if (session('status') == 'verification-link-sent')
    <div class="uk-margin">
        <div class="uk-alert-success" uk-alert>
            <p>{{ __('A new verification link has been sent to the email address you provided during registration.') }}</p>
        </div>
    </div>
    @endif
    
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div class="uk-margin">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        <button class="uk-button uk-button-primary uk-width-1-1">
            {{ __('Resend Verification Email') }}
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        
        <button class="uk-button uk-button-primary uk-width-1-1">
            {{ __('Log Out') }}
        </button>
    </form>
</x-guest-layout>