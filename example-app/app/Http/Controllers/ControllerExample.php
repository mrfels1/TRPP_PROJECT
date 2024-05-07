<?php

namespace App\Http\Controllers;

use App\Http\Library\ApiHelpers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ControllerExample extends Controller
{
    use ApiHelpers;
    public function post(Request $request): JsonResponse
    {
        $post = DB::table('posts')->get();
        return $this->onSuccess($post, 'Post Retrieved');
    }
    public function singlePost(Request $request, $id): JsonResponse
    {

        $post = DB::table('posts')->where('id', $id)->first();
        if (!empty($post)) {
            return $this->onSuccess($post, 'Post Retrieved');
        }
        return $this->onError(404, 'Post Not Found');
    }
    public function createPost(Request $request): JsonResponse
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), $this->postValidationRules());
        if ($validator->passes()) {
            // Создание нового сообщения
            $post = new Post();
            $post->title = $request->input('title');
            $post->slug = Str::slug($request->input('title'));
            $post->content = $request->input('content');
            $post->save();
            return $this->onSuccess($post, 'Post Created');
        }
        return $this->onError(400, $validator->errors());
    }
    public function updatePost(Request $request, $id): JsonResponse
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), $this->postValidationRules());
        if ($validator->passes()) {
            // Обновление сообщения
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->save();
            return $this->onSuccess($post, 'Post Updated');
        }
        return $this->onError(400, $validator->errors());
    }
    public function deletePost(Request $request, $id): JsonResponse
    {
        $user = $request->user();
        $post = Post::find($id); // Найдем id сообщения
        $post->delete(); // Удаляем указанное сообщение
        if (!empty($post)) {
            return $this->onSuccess($post, 'Post Deleted');
        }
        return $this->onError(404, 'Post Not Found');
    }
    public function createWriter(Request $request): JsonResponse
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), $this->userValidatedRules());
        if ($validator->passes()) {
            // Создаем нового Автора
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => 2,
                'password' => Hash::make($request->input('password')),
            ]);
            $writerToken = $user->createToken('auth_token', ['writer'])->plainTextToken;
            return $this->onSuccess($writerToken, 'User Created With Writer Privilege');
        }
        return $this->onError(400, $validator->errors());
    }

    public function deleteUser(Request $request, $id): JsonResponse
    {
        $user = $request->user();
        $user = User::find($id); // Найдем id пользователя
        if ($user->role !== 1) {
            $user->delete(); // Удалим указанного пользователя
            if (!empty($user)) {
                return $this->onSuccess('', 'User Deleted');
            }
            return $this->onError(404, 'User Not Found');
        }
        return $this->onError(401, 'Unauthorized Access');
    }
}
