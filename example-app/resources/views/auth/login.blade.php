<style>
    body {
        background-color: #392C46;
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
            'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue',
            sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        margin: auto;
        margin-top: 100px;
        background: #fff;
        width: 600px;
        padding-bottom: 30px;
        border-radius: 10px;
    }

    .header {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 9px;
        width: 100%;
        margin-top: 30px;
    }

    .text {
        color: black;
        font-size: 48px;
        font-weight: 700;
    }

    .underlineFRONT {
        width: 100px;
        height: 7px;
        background: #A2DC58;
        border-radius: 9px;
    }

    .inputs {
        margin-top: 55px;
        margin-bottom: 25px;
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .email {
        width: 60;
        margin-left: 10px;
        display: block;
        font-weight: 500;
        /* medium */
        font-size: 1rem;
        /* 14px for base font-size of 16px */
        color: #4a5568;
        /* text-gray-700 */
    }

    .dark .email {
        color: #e2e8f0;
        /* dark:text-gray-300 */
    }

    .input {
        display: flex;
        align-items: center;
        margin: auto;
        width: 480px;
        height: 80px;
        background: #eaeaea;
        border-radius: 6px;
    }

    .input img {
        margin: 0px 30px;
    }

    .input input {
        height: 50px;
        width: 400px;
        background: transparent;
        border: none;
        outline: none;
        color: #797979;
        font-size: 19px;
    }

    .checkbox-container {
        padding-left: 60px;
        color: #797979;
        margin-top: 30px;
        font-size: 18px;
    }


    .submit-container {
        display: flex;
        justify-content: center;
        /* gap: 30px; */
        margin: 30px auto;
    }

    .submit {
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

    .goRegistr a {
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
    a:hover {
        cursor: pointer;
        color: #A2DC58;
    }

    .input_field {
        border: 1px solid #e5e7eb;
        /* border-gray-300 */
        background-color: #fff;
        /* Default background color */
        color: #4a5568;
        /* Default text color */
        border-radius: 0.375rem;
        /* rounded-md */
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        /* shadow-sm */
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        margin-right: 10px;
        /* mt-1 */
    }

    .dark .email_input {
        border-color: #4a5568;
        /* dark:border-gray-700 */
        background-color: #1a202c;
        /* dark:bg-gray-900 */
        color: #e2e8f0;
        /* dark:text-gray-300 */
    }

    .email_input:focus {
        outline: none;
        /* Remove default focus outline */
        border-color: #2feb25;
        /* focus:border-indigo-500 */
        box-shadow: 0 0 0 2px rgba(162, 220, 88);
        /* focus:ring-indigo-500 */
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-background-clip: text;
        -webkit-text-fill-color: #000000;
        transition: background-color 5000s ease-in-out 0s;
        box-shadow: 0 0 0 2px rgba(162, 220, 88);
    }

    .dark .email_input:focus {
        border-color: rgb(115, 159, 58);
        /* dark:focus:border-indigo-600 */
        box-shadow: 0 0 0 2px rgba(162, 220, 88, 0.5);
        /* dark:focus:ring-indigo-600 */
    }

    .text-sm {
        font-weight: 500;
        /* medium */
        font-size: 1rem;
    }

    .text-red-600 {
        color: #DC2626;
    }

    .dark:text-red-400 {
        color: #DC2626;
    }

    .space-y-1 {
        margin-top: 0.25rem;
        margin-bottom: 0.25rem;
        margin-left: 4rem;
    }

    .mt-2 {
        margin-top: 0.5rem;
    }

    .checkbox {
        border-radius: 9999px;
        background-color: rgba(162, 220, 88, 1);
        border: 1px solid #D1D5DB;
        color: rgba(162, 220, 88);
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        accent-color: rgba(162, 220, 88, 1);
    }

    .checkbox:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(162, 220, 88, 0);
    }

    .dark .checkbox {
        background-color: #1F2937;
        border: 1px solid #4B5563;
        color: rgba(162, 220, 88);
    }

    .dark .checkbox:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(162, 220, 88, 0);
        box-shadow: 0 0 0 3px rgba(31, 41, 55, 0);
    }

    .login {
        display: inline-flex;
        align-items: center;
        padding: 1.5rem 3rem;
        background-color: #1F2937;
        border: 1px solid transparent;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 1rem;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        letter-spacing: 0.1em;
        transition: background-color 0.15s ease-in-out;
        margin-left: 0.75rem;
    }

    .login:hover,
    .login:focus {
        background-color: #58b824;
        color: rgb(0, 0, 0);
    }

    .login:active {
        background-color: #1F2937;
    }

    .dark .login {
        background-color: #F3F4F6;
        border: 1px solid transparent;
        color: #374151;
    }

    .dark .login:hover,
    .dark .login:focus {
        background-color: #FFFFFF;
    }

    .dark .login:active {
        background-color: #1F2937;
    }

    .login:focus {
        outline: none;
        box-shadow: 0 0 0 2px #2563EB, 0 0 0 5px rgba(91, 135, 26, 0.5);
    }
</style>

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
                <div>
                    <div class="input">
                        <label class="email" for="email">
                            Email
                        </label>
                        <img src="{{ asset('email.png') }}" />
                        <input class="input_field" id="email" type="email" name="email" required="required"
                            autofocus="autofocus" autocomplete="username">
                    </div>
                </div>

                <!-- Password -->
                <!-- <div class="mt-4"> -->
                <div class="input">
                    <label class="email" for="email">
                        Password
                    </label>
                    <img src="{{ asset('password.png') }}" />
                    <input class="input_field" id="password" type="password" name="password" required="required"
                        autofocus="autofocus" autocomplete="current-password">

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>

            <!-- Remember Me -->
            <!-- <div class="block mt-4"> -->
            <!-- <div class="input"> -->
            <label for="remember_me" class="checkbox-container inline-flex items-center">
                <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
            <!-- </div> -->

            <div class="flex items-center justify-end mt-4">
                <div class="goRegistr">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>
                <div class="submit-container">

                    <button type="submit" class="login">
                        Log in
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </form>
    </div>
</x-guest-layout>