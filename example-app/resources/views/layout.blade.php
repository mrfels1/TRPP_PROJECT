<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('allStyle.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Привязка css и js с помощью vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/NavStyle.css'])
</head>
<div class="forum-container">
    @include('layouts.navigation')
</div>
<!-- Page Heading -->
@if (isset($header))
<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
    </div>
</header>
@endif

<body>
    <!-- <h1 class="bg-white dark:bg-gray-800 shadow">Mindle</h1> -->
    {{-- VIEW OUTPUT 
            TODO: Layout 
            --}}
    @yield('content')
</body>

</html>