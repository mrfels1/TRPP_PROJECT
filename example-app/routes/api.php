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
    return response()->json(User::findOrFail($id));
});

Route::get('/posts', function () {
    return response()->json(Post::all());
});

Route::get('/search/{text}', function (string $text) {
    return response()->json(Post::reorder()->orderBy("created_at", "desc")->where('title', 'LIKE', $text)
        ->orWhere('text_content', 'LIKE', $text)->get());
});
