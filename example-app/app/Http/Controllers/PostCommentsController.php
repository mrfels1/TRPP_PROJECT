<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $comment = Comment::where($request->post_id);
        $comment->delete();
        return back();
    }
}
