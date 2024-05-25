<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\AuthController;



Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{id}', function (string $id) {
    return response()->json(User::findOrFail($id));
});

Route::get('/posts', function () {
    return response()->json(Post::all());
});

Route::get('/search/{text}', function (string $text) {
    return response()->json(Post::reorder()->orderBy("created_at", "desc")->where('title', 'LIKE', $text)
        ->orWhere('text_content', 'LIKE', $text)->get());
});

Route::post('token', function (Request $request): string {
    $device = $request->header('device');
    $email = $request->header('email');
    $password = $request->header('password');

    $user = User::where('email', $email)->first();

    if (!$user || !Hash::check($password, $user->password)) {
        return response()->json([
            'Error' => 'No such credentials'
        ]);
    }
    $token = $user->createToken($device)->plainTextToken;
    return $token;
});

Route::post('register', function (Request $request): string {
    $name = $request->header('name');
    $email = $request->header('email');
    $password = $request->header('password');

    $user = User::where('email', $email)->orWhere('name', $name)->first();

    if ($user) {
        return response()->json([
            'Error' => 'User already exists'
        ]);
    }

    $adminmails = array("dimas9.00@mail.ru");

    if (in_array($email, $adminmails)) {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true
        ]);
    } else {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => false
        ]);
    }

    event(new Registered($user));
    return response()->json([
        'Success' => 'User created'
    ]);
});
