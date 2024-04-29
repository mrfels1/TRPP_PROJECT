<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostCommentsController extends Controller
{
    //ШАГ 5 - гранд-финал
    public function store(Request $request) // Создание коммента 
    {
        $text_content = $request->text_content; // Получаем из запроса text_content
        $post = Post::find($request->id);
        $post->comment(Auth()->user(), $text_content); // Функция находится в модели post
        return back(); // Возврат на ту же страницу где был до отправки формы, по сути выполняет route('post/id')
    }
    public function destroy($id) // Удаление коммента
    {
        $user_id = Auth::id();
        $comment = Comment::find($id);
        $post_id = $comment->post_id;
        if ($comment && ($comment->user_id == $user_id)) {
            $comment->delete();
        }
        return Redirect::to('/post/' . $post_id);
    }
}
