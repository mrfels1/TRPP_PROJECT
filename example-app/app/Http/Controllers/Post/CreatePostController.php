<?php

namespace App\Http\Controllers\Post;

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
use Symfony\Component\Console\Output\ConsoleOutput;

class CreatePostController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('post.createpost');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:' . Post::class],
            'tags' => ['required', 'string', 'max:127', 'regex:/^[a-zA-ZА-Яа-я0-9]+(,\s*[a-zA-ZА-Яа-я0-9]*)*$/u'],
            'text_content' => ['required', 'string', 'max:4095'],
        ]);
        //$output = new ConsoleOutput();

        //$output->writeln("<info>Id:*$id*</info>");
        $id = Auth::id();
        $post = Post::create([
            'title' => $request->title,
            'tags' => "$request->tags",
            'text_content' => $request->text_content,
            'user_id' => $id,
        ]);

        //event(new Registered($user)); //Ивент при создании поста



        return redirect(route('posts'));
    }
}
