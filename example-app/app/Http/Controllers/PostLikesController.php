<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Post;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class PostLikesController extends Controller
{
    /**
     * Ставит лайк.
     *
     * Запускает функцию like модели post
     */
    #[OpenApi\Operation]
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
