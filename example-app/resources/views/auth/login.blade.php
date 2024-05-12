<!-- <style>
    body{
    background-color: #392C46;
    margin: 0;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
    'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue',
    sans-serif;
}
    .container{
    display: flex;
    flex-direction: column;
    margin: auto;
    margin-top: 100px;
    background: #fff;
    width: 600px;
    padding-bottom: 30px;
    border-radius: 10px;
}

.header{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 9px;
    width: 100%;
    margin-top: 30px;
}

.text{
    color: black;
    font-size: 48px;
    font-weight: 700;
}

.underlineFRONT{
    width: 100px;
    height: 7px;
    background: #A2DC58;
    border-radius: 9px;
}

.inputs{
    margin-top: 55px;
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.input{
    display: flex;
    align-items: center;
    margin: auto;
    width: 480px;
    height: 80px;
    background: #eaeaea;  
    border-radius: 6px;
}

.input img{
    margin: 0px 30px;
}

.input input{
    height: 50px;
    width: 400px;
    background: transparent;
    border: none;
    outline: none;
    color: #797979;
    font-size: 19px;
}

.checkbox-container{
    padding-left: 60px;
    color: #797979;
    margin-top: 30px;
    font-size: 18px;
}


.submit-container{
    display: flex;
    justify-content: center;
    /* gap: 30px; */
    margin: 30px auto;
}

.submit{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 220px;
    height: 59px;
    color: #fff;
    background: #392C46;
    border-radius: 50px;
    font-size: 19px;
    font-weight: 700;
    cursor: pointer;
}

.goRegistr a{
    padding-left: 60px;
    margin-top: 17px;
    color: #797979;
    font-size: 18px;
    outline: none;
  text-decoration: none;
}
/* a{
    margin-top: 17px;
    color: #797979;
    font-size: 18px;
} */
a:hover{
    cursor: pointer;
    color: #A2DC58;
}
</style> -->

<x-guest-layout>

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
        <div><div class="input">
            <x-input-label for="email" :value="__('Email')" />
            <img src="example-app\resources\views\components\Assets\email.png"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div></div>

        <!-- Password -->
        <!-- <div class="mt-4"> -->
            <div class="input">
            <x-input-label for="password" :value="__('Password')" />
            <img src="../components/Assets/password.png"/>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
    </div>
        <!-- Remember Me -->
        <!-- <div class="block mt-4"> -->
            <!-- <div class="input"> -->
            <label for="remember_me" class="checkbox-container inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        <!-- </div> -->

        <div class="flex items-center justify-end mt-4">
            <div class="goRegistr">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
            <div class="submit-container">
            <x-primary-button class="submit ms-3">
                {{ __('Log in') }}
            </x-primary-button>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </form>
    </div>
</x-guest-layout>