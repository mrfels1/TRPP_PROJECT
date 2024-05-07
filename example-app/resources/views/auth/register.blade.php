<style>
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
    justify-content: center;
    /* justify-items: center;
    align-items: center; */
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
    flex-direction: row;
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
    width: 90%;
    background: transparent;
    border: none;
    outline: none;
    color: #797979;
    font-size: 19px;
}
.goLogin{
    padding-top: 20px;
}

.goLogin a{
    margin-top: 10px;
    padding-left: 60px;
    margin-top: 17px;
    color: #797979;
    font-size: 18px;
}

a:hover{
    cursor: pointer;
    color: #A2DC58;
}

.submit-container{
    /* padding-left: 60px; */
    justify-content: center;
    display: flex;
    gap: 30px;
    margin: 35px auto;
box-shadow: #797979;
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
</style>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
        <div>
            
            <x-input-label for="name" :value="__('Name')" />
            <img src="../components/Assets/person.png"/>
            <x-text-input id="name" class="block mt-1 w-full" aria-placeholder="Name" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    </div>
        <!-- Email Address -->
        <div class="input">
        <!-- <div class="mt-4"> -->
            <x-input-label for="email" :value="__('Email')" /> 
            
            <img src="../components/Assets/email.png"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" /> 
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <!-- </div> -->
    </div>
        <!-- Password -->
        <div class="input">
        <!-- <div class="mt-4"> -->
            <x-input-label for="password" :value="__('Password')" />
            
            <img src="../components/Assets/password.png"/>

            <!-- <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" /> -->
                <x-text-input  type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <!-- </div> -->
    </div>
        <!-- Confirm Password -->
    <div class="input">
        <!-- <div class="mt-4"> -->
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <img src="../components/Assets/password.png"/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
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
