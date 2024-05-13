<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
<!--<link href="{{ asset('css/LogStyle.css') }}" rel="stylesheet"> -->
@vite(['resources/css/LogStyle.css'])
<layout>

    <div class='container'>
        <!-- Session Status -->
        <x-auth-session-status class="container mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="header">
                <div class="text">Login</div>
                <div class='underlineFRONT'> </div>
            </div>
            <div class="inputs">
                <!-- Email Address -->
                <div>
                    <div class="input">
                        <!-- <x-input-label for="email" :value="__('Email')" /> -->
                        <img src="{{ asset('email.png') }}" />
                        <x-text-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Password -->

                <div class="input">
                    <!-- <x-input-label for="password" :value="__('Password')" /> -->
                    <img src="{{ asset('password.png') }}" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                        placeholder="Password" required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>
            <!-- Remember Me -->

            <label for="remember_me" class="checkbox-container inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900
                border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500
                dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>


            <!-- <div class="flex items-center justify-end mt-4"> -->
            <div class="goRegistr">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Dont you have a profile?') }}
                </a>
                @endif
            </div>
            <div class="submit-container">
                <x-primary-button class="submit ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
            <!-- </div> -->
        </form>
    </div>
</layout>