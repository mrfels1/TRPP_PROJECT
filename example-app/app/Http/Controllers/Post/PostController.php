<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Output\ConsoleOutput;

class PostController extends Controller
{

    public function create(): View
    {
        return view('post.createpost');
    }


    public function store(Request $request): RedirectResponse
    {
        // Проверка на условия
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tags' => ['required', 'string', 'max:127', 'regex:/^[a-zA-ZА-Яа-я0-9]+(,\s*[a-zA-ZА-Яа-я0-9]*)*$/u'],
            'text_content' => ['required', 'string', 'max:4095'],
        ]);

        $id = Auth::id(); //id пользователя отправившего запрос на создание поста

        $tags_array = explode(", ", $request->tags); //разделяем строку


        $post = Post::create([ //создает в бд новую запись с id = id+1 от послднего и заполняет остальные поля
            'title' => $request->title,
            'text_content' => $request->text_content,
            'user_id' => $id,
        ]);

        foreach ($tags_array as $tag) {
            $post->tag($tag);
        };
        //event(new Registered($user)); //Ивент при создании поста (не используется)
        return redirect(route('posts')); //Вызов пути posts (см. web.php)
    }
    public function destroy($id): RedirectResponse //DELETE запрос
    {
        $user_id = Auth::id();
        $post = Post::find($id);
        if ($post && (($post->user_id == $user_id) or (Auth::user()->is_admin))) { //Проверка на то, что только автор поста может его удалить
            $post->delete();
        }
        return Redirect::to('/posts'); // Аналогичен вызову пути выше
    }
}
