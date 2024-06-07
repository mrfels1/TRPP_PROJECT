<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
@vite(['resources/css/CreatePostStyle.css'])
@extends ('layout')

@section('content')
@unless (Auth::check())
You are not signed in.
@endunless

<div class="create-post-container">
    <div class="create-header">
        <h1>Create Post</h1>
        <div class='underline'> </div>
    </div>
    <form method="POST" action="{{ route('post.store') }}">
        <!-- csrf защита от подделки -->
        @csrf

        <!-- Title -->
        <!-- <x-input-label for="title" :value="__('Title')" /> -->
        <!-- <input id="title"  placeholder="Title" class="content-input block mt-1 w-full" type="text" name="title" :value="old('title')" required
            autofocus /> -->
        <div class="input-container">
            <input id="title" placeholder="Title" class="content-input" type="text" name="title" :value="old('title')"
                required autofocus />
        </div>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />


        <!-- Tags -->

        <!-- <x-input-label for="tags" :value="__('Tags')" /> -->
        <!-- <input id="tags" placeholder="Tags"  class="content-input block mt-1 w-full" type="text" name="tags" :value="old('tags')" required
            autofocus /> -->
        <div class="input-container">
            <input id="tags" placeholder="Tags" class="content-input" type="text" name="tags" :value="old('tags')"
                required autofocus />
        </div>
        <x-input-error :messages="$errors->get('tags')" class="mt-2" />


        <!-- Text -->

        <!-- <x-input-label for="text_content" :value="__('Text')" /> -->
        <!-- <x-text-input id="text_content" placeholder="Text" class="content-input block mt-1 w-full" type="text" name="text_content"
            :value="old('text_content')" required autofocus /> -->
        <div class="input-container">
            <input id="text_content" placeholder="Text" class="content-input" type="text" name="text_content"
                :value="old('text_content')" required autofocus />
        </div>
        <x-input-error :messages="$errors->get('text_content')" class="mt-2" />


        <!-- <div class="button-container flex items-center justify-end mt-4">
        <x-primary-button class="submit-button ms-4">
            {{ __('Create post!') }}
        </x-primary-button>
    </div> -->
        <div class="button-container">
            <button class="submit-button">
                {{ __('Create post!') }}
            </button>
        </div>
    </form>
</div>
@endsection