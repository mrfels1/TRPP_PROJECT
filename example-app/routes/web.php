<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Post\CreatePostController;

//Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('main');;


//Перейти в профиль
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Создать пост
Route::get('createpost', [CreatePostController::class, 'create'])
    ->name('createpost');

Route::post('createpost', [CreatePostController::class, 'store']);

//Перейти на страницу постов
Route::get('/posts', function () {
    $posts = Post::all();
    return view('posts', compact('posts'));
})->name('posts');
//Перейти на страницу поста
Route::get('/post/{id}', function (string $id) {
    $post = Post::find($id);
    return view('post', compact('post'));;
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
