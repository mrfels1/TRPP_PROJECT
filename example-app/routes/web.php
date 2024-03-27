<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;


//Выводит главную страницу со всеми постами
//Передавая переменные heading и posts
Route::get(
    '/',
    function () {
        return view(
            'homepage',
            [
                'heading' => 'Homepage',
                'posts' => Post::all(),
            ]
        );
    }
);

//Выводит страницу с данными из поста
//Передавая переменные post
Route::get(
    '/post/{id}',
    function ($id) {
        return view(
            'post',
            [
                'post' => Post::find($id)
            ]
        );
    }
);
