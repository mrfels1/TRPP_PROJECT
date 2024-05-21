<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\ControllerExample;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', 'AuthController@login');

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

Route::get('/key', function () {
    if (Auth::check()) {
        return auth()
            ->user()
            ->createToken('auth_token')
            ->plainTextToken;
    }
    return redirect("/");
})->middleware('auth');

Route::group(['middleware' => 'auth:sanctum'], function () {
    // список всех сообщений
    Route::get('posts', [ControllerExample::class, 'post']);
    // получить сообщение
    Route::get('posts/{id}', [ControllerExample::class, 'singlePost']);
    // добавить сообщение
    Route::post('posts', [ControllerExample::class, 'createPost']);
    // обновить сообщение
    Route::put('posts/{id}', [ControllerExample::class, 'updatePost']);
    // удалить сообщение
    Route::delete('posts/{id}', [ControllerExample::class, 'deletePost']);
    // добавить нового пользователя с ролью Writer
    Route::post('users/writer', [ControllerExample::class, 'createWriter']);
    // добавить нового пользователя с Subscriber
    Route::post(
        'users/subscriber',
        [ControllerExample::class, 'createSubscriber']
    );
    // удалить пользователя
    Route::delete('users/{id}', [ControllerExample::class, 'deleteUser']);
});
