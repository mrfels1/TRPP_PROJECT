<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
    public function apistore(Request $request)
    {
        $user = $request->user('api');
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $post = Post::find($request->id);
        $post->like($user);
    }
    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $post->dislike(Auth()->user());
        return back();
    }
    public function apidestroy(Request $request)
    {
        $user = $request->user('api');
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $post = Post::find($request->id);
        $post->dislike($user);
        return back();
    }
    public function apirate(Request $request)
    {
        $user = $request->user('api');

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $post = Post::find($request->id);
        $isLiked = $post->isLikedBy($user);
        $isDisliked = $post->isDislikedBy($user);
        $canDelete = ($user->id == $post->user_id) || $user->is_admin;

        return response()->json([
            'liked' => $isLiked ? 'true' : 'false',
            'disliked' => $isDisliked ? 'true' : 'false',
            'canDelete' => $canDelete ? 'true' : 'false',
            'user_id' => $user->id,
            'post_author_id' => $post->user_id
        ], 200);
    }
}
