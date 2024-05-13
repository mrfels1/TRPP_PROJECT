<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/RegistrStyle.css') }}" rel="stylesheet">

<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->

<x-guest-layout>

    <div class='container'>
    <!-- Форма отправится ввиде POST запроса по пути register -->
    <form method="POST" action="{{ route('register') }}">
        <!-- csrf защита от подделки -->
        @csrf
        <div class="header">
            <div class="text">Register</div>
            <div class='underlineFRONT'> </div>
        </div>
<div class="inputs">
        <!-- Name -->
        <div class="input">
        <!-- <div> -->
            
            <!-- <x-input-label for="name" :value="__('Name')" /> -->
            <img src="{{ asset('person.png') }}"/>
            <x-text-input id="name"  placeholder="Name" class="block mt-1 w-full" aria-placeholder="Name" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <!-- </div> -->
    </div>
        <!-- Email Address -->
        <div class="input">
        <!-- <div class="mt-4"> -->
            <!-- <x-input-label for="email" :value="__('Email')" />  -->
            
            <img src="{{ asset('email.png') }}"/>
            <x-text-input id="email"  placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" /> 
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <!-- </div> -->
    </div>
        <!-- Password -->
        <div class="input">
        <!-- <div class="mt-4"> -->
            <!-- <x-input-label for="password" :value="__('Password')" /> -->
            
            <img src="{{ asset('password.png') }}"/>

            <!-- <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" /> -->
                <x-text-input  type="password"  placeholder="Password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <!-- </div> -->
    </div>
        <!-- Confirm Password -->
    <div class="input">
        <!-- <div class="mt-4"> -->
            <!-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> -->
            <img src="{{ asset('password.png') }}"/>
            <x-text-input id="password_confirmation"  placeholder="Password"  class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        <!-- </div> -->
    </div>
</div>       
        <div class="goLogin flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a></div>
        <div class="submit-container">
            <x-primary-button class="submit">
                {{ __('Register') }}
            </x-primary-button>
    </div></div>
    </form>
    </div>
</x-guest-layout>
