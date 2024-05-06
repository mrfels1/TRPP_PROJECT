<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class PostsController extends Controller
{

    /**
     * Проверка на поиск.
     *
     * Возвращает view постов, по условию поиска если таковое имеется.
     */
    #[OpenApi\Operation]
    public function index()
    {
        if (request()->has('sortBy')) {
            if (request()->get('sortBy') == 'up') {
                $posts = Post::reorder()->orderByRaw('likes is null')->orderBy("likes", "desc");
            } else if (request()->get('sortBy') == 'down') {
                $posts = Post::reorder()->orderByRaw('dislikes is null')->orderBy("dislikes", "desc");
            } else if (request()->get('sortBy') == 'date') {
                $posts = Post::reorder()->orderBy("created_at", "desc");
            } else {
                $posts = Post::reorder()->orderBy("created_at", "desc");
            }
        } else {
            $posts = Post::reorder()->orderBy("created_at", "desc");
        }

        if (request()->has('search')) {
            $posts = $posts->where('title', 'LIKE', '%' . request()->get('search') . '%')
                ->orWhere('text_content', 'LIKE', '%' . request()->get('search') . '%');
        }

        if (request()->has('tag')) {
            $tags = DB::table('tags')->where('text_content', 'LIKE', '%' . request()->get('tag') . '%')->get();

            $posts = $posts->join($tags, 'posts.id', '=', 'tags.post_id')->get(); // FIXME: нихуя не работает блять
        }
        $popular_tags = DB::table('tags')
            ->selectRaw("text_content, COUNT(*) AS tag_count")
            ->whereRaw("created_at >= NOW() - INTERVAL '24 hours'")
            ->groupByRaw("text_content")
            ->orderByRaw("tag_count DESC")
            ->limit(10)
            ->get();

        return view('posts', [
            'posts' => $posts->paginate(10), //TODO: Понять как работает pagination
            'popular_tags' => $popular_tags
        ]);
    }
}
