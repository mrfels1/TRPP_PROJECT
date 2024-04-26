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
    public function store(Request $request)
    {
        $text_content = $request->text_content;
        $post = Post::find($request->id);
        Log::debug($request);
        $post->comment(Auth()->user(), $text_content);
        return back();
    }
    public function destroy($id)
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
