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

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="uk-margin">
            <div class="uk-width-1-1">
                <label for="name">Name</label>
                <input class="uk-input uk-margin-small-top uk-border-rounded uk-box-shadow-small" id="name"
                    name="name" type="text" :value="old('name')" required="required">
            </div>
        </div>

        <!-- Email Address -->
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <label for="email">Email</label>
                <input class="uk-input uk-margin-small-top uk-border-rounded uk-box-shadow-small" id="email"
                    name="email" :value="old('email')" type="email" required="required">
            </div>
        </div>

        <!-- Password -->
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <label for="password">Password</label>
                <input class="uk-input uk-margin-small-top uk-border-rounded uk-box-shadow-small" id="password"
                    name="password" type="password" required="required">
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <label for="password_confirmation">Confirm Password</label>
                <input class="uk-input uk-margin-small-top uk-border-rounded uk-box-shadow-small"
                    id="password_confirmation" name="password_confirmation" type="password" required="required">
            </div>
        </div>
        <div class="uk-text-right">
            <button class="uk-button uk-button-secondary uk-border-rounded">{{ __('Register') }}</button>
        </div>
    </form>
</x-guest-layout>
