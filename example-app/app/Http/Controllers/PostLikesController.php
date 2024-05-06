<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Post;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function store(Request $request)
    {
        $post = Post::find($request->id);
        $post->like(Auth()->user());
        return back();
    }
    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $post->dislike(Auth()->user());
        return back();
    }
}
