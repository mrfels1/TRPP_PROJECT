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

        $posts = Post::orderBy("created_at", "desc");

        if (request()->has('search')) {
            $posts = $posts->where('title', 'LIKE', '%' . request()->get('search') . '%')
                ->orWhere('text_content', 'LIKE', '%' . request()->get('search') . '%');
        }

        return view('posts', [
            'posts' => $posts->paginate(10) //TODO: Понять как работает pagination
        ]);
    }
}
