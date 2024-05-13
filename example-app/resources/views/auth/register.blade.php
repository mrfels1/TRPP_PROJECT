<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/RegistrStyle.css') }}" rel="stylesheet">

<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->

<layout>

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
            <!-- <x-input-label for="name" :value="__('Name')" /> -->
            <img src="{{ asset('person.png') }}"/>
            <input id="name"  placeholder="Name" class="block mt-1 w-full" aria-placeholder="Name" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
      
    </div>

        <div class="input">
            <!-- <x-input-label for="email" :value="__('Email')" />  -->
            <img src="{{ asset('email.png') }}"/>
            <input id="email"  placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" /> 
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <!-- </div> -->
    </div>
        
        <div class="input">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->
            <img src="{{ asset('password.png') }}"/>
            <!-- <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" /> -->
                <input  type="password"  placeholder="Password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="input">
            <!-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> -->
            <img src="{{ asset('password.png') }}"/>
            <input id="password_confirmation"  placeholder="Password"  class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
</div>       
        <!-- <div class="goLogin flex items-center justify-end mt-4"> -->
            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> -->
            <div class="goLogin flex items-center">
            <a class="underline"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
        <div class="submit-container">
            <button class="submit">
                {{ __('Register') }}
            </button>
    </div></div>
    </form>
    </div>
</layout>
