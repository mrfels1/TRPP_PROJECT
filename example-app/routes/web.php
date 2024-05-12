<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Auth;


// view('welcome'); аналог inertia::render
//Главная страница
Route::get('/', [PostsController::class, 'index'])->name('main');;              // альтернативное имя пути - main


//Перейти в профиль
Route::get('/dashboard', [ProfileController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard');    // перед этим проверит залогинен ли пользователь

Route::get('/auth-status', function () {
    $user = Auth::user();
    if ($user) {
        return response()->json([
            'authenticated' => true,
            'hasProfile' => $user->profile !== null,
        ]);
    } else {
        return response()->json([
            'authenticated' => false,
            'hasProfile' => false,
        ]);
    }
});


//Создать и удалить пост
Route::get('createpost', [PostController::class, 'create']) // GET запрос по адресу /createpost, 
    ->name('post.createpost');                              // выполнит функцию create класса PostController  
Route::post('createpost', [PostController::class, 'store'])->name('post.store'); // POST запрос, выполнит store класса PostController
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.delete'); // DELETE запрос, выполнит delete класса PostController


//Перейти на страницу постов
Route::get('/posts', [PostsController::class, 'index'])->name('posts'); // GET запрос по адресу /posts


//Перейти на страницу поста
// ШАГ 1 -> post.blade.php строка 57
Route::get('/post/{id}', function (string $id) {    // GET запрос по адресу /post/{id} (id указывается в ссылке прим. 127.0.0.1:8000/post/2)
    $post = Post::findOrFail($id);                  // Находим в бд строку Post'а по id из запроса 
    return view('post', compact('post'));   // Передача пользователю странцы post с переданным в неё post 
});


// Аунтетификация (не моё (автоматически сгенерированно))
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Лайкнуть пост
Route::post('/post/{id}/like', [PostLikesController::class, 'store'])->name('post.like');
Route::delete('/post/{id}/like', [PostLikesController::class, 'destroy'])->name('post.destroy');

//Сделать комментарий
Route::post('/post/{id}/comment', [PostCommentsController::class, 'store'])->name('comment.make'); // ШАГ 4 -> app/Http/Controllers/PostComments/Controller
Route::delete('/post/{id}/comment', [PostCommentsController::class, 'destroy'])->name('comment.destroy');

require __DIR__ . '/auth.php';
