<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #392C46;
            height: 100vh;
            font-family: 'Raleway', sans-serif;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            font-weight: 1000;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    
       
    </style>
</head>
<!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <!-- Если есть метод(?) login в rotes -->
        <div class="top-right links">
            <!-- Проверяет залогинен ли пользователь -->
            @if (Auth::check())
            <a href="{{ route('post.createpost')}}">
                Create Post</a>
            <!--TODO:-->
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @endif

        <div class="content">
           

            <div class="links">
                <a href="{{ url('/posts') }}">Posts</a>
                <!--TODO: Сделать красивым-->
            </div>
        </div>
    </div>
</body>

</html>