<x-guest-layout>
    <!-- Error Alerts -->
    @if (count($errors) > 0)
        <div class="uk-margin">
            @foreach ($errors->all() as $message)
                <div class="uk-alert-warning" uk-alert>
                    <p>{{ $message }}</p>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Success Alerts -->
    @if (session('status'))
        <div class="uk-margin">
            <div class="uk-alert-success" uk-alert>
                <p>{{ session('status') }}</p>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="uk-margin">
            <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>

        <!-- Email Address -->
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <label for="email">Email</label>
                <input class="uk-input uk-border-rounded" id="email" name="email" type="email"
                    required="required" :value="old('email')">
            </div>
        </div>

        <button
            class="uk-button uk-button-secondary uk-border-rounded uk-width-1-1">{{ __('Email Password Reset Link') }}</button>
    </form>
</x-guest-layout>
