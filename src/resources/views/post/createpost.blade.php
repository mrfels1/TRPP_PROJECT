<link href="{{ asset('allStyle.css') }}" rel="stylesheet">
@vite(['resources/css/CreatePostStyle.css'])
@vite(['resources/js/scriptNav.js'])
@extends ('layout')

@section('content')
@unless (Auth::check())
You are not signed in.
@endunless

<style>
      textarea {
    width: 100%;
    min-height: 50px;
    resize: none; 
    padding: 10px;
    border-radius: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    line-height: 1.5;
    overflow: hidden;
    transition: height 0.2s ease; 
    margin-bottom: 20px;
}
</style>
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
            <input id="tags" placeholder="tag1, tag2, tag3..." class="content-input" type="text" name="tags" :value="old('tags')"
                required autofocus />
        </div>
        <x-input-error :messages="$errors->get('tags')" class="mt-2" />


        <!-- Text -->

        <!-- <x-input-label for="text_content" :value="__('Text')" /> -->
        <!-- <x-text-input id="text_content" placeholder="Text" class="content-input block mt-1 w-full" type="text" name="text_content"
            :value="old('text_content')" required autofocus /> -->
        {{-- <div class="input-container">
            <input id="text_content" placeholder="Text" class="content-input" type="text" name="text_content"
                :value="old('text_content')" required autofocus />
     
        </div> --}}
        <textarea required pattern=".*\S+.*" name="text_content" placeholder="Text"  :value="old('text_content')" oninput="autoResize(this)"></textarea>
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