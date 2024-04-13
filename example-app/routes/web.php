<?php

use App\Models\Post;
use App\Models\User;
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
    $posts = Post::lazy(); //TODO: Связать post с user + вывод авторов каждого поста на этой странице
    return view('posts', compact('posts'));
})->name('posts');

//Перейти на страницу поста
Route::get('/post/{id}', function (string $id) {
    $post = Post::find($id);
    $user = User::find($post->user_id);
    return view('post', compact('post', 'user'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
