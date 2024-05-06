<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;


/* 
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/posts', function () {
    return PostResource::collection(Post::all()->keyBy->id);
});

Route::get('/search', function () {
    return PostResource::collection(Post::all()->keyBy->id);
});
