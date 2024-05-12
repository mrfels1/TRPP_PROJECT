@extends ('layout')

@section('content')
@if (Route::has('login'))
<!-- Если есть метод(?) login в rotes -->
<div class="top-right links">
    <!-- Проверяет залогинен ли пользователь -->
    @if (Auth::check())
    <a href="{{ route('post.createpost')}}">Create Post</a>
    <!--TODO:-->
    <a href="{{ url('/dashboard') }}">Dashboard</a>
    @else
    <a href="{{ url('/login') }}">Login</a>
    <a href="{{ url('/register') }}">Register</a>
    @endif
</div>
@endif
<form method="POST" action="{{ route('post.store') }}">
    <!-- csrf защита от подделки -->
    @csrf

    <!-- Title -->
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
            autofocus />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Tags -->
    <div>
        <x-input-label for="tags" :value="__('Tags')" />
        <x-text-input id="tags" class="block mt-1 w-full" type="text" name="tags" :value="old('tags')" required
            autofocus />
        <x-input-error :messages="$errors->get('tags')" class="mt-2" />
    </div>

    <!-- Text -->
    <div>
        <x-input-label for="text_content" :value="__('Text')" />
        <x-text-input id="text_content" class="block mt-1 w-full" type="text" name="text_content"
            :value="old('text_content')" required autofocus />
        <x-input-error :messages="$errors->get('text_content')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4">
            {{ __('Create post!') }}
        </x-primary-button>
    </div>
</form>

@endsection