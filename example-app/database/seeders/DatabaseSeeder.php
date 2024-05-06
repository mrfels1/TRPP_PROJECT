<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'MrFels1',
            'email' => 'dimas9.00@mail.ru',
            'password' => '123321',
            'is_admin' => true
        ]);
        Post::create([
            'title' => 'Automatically created post',
            'user_id' => 1,
            'text_content' => 'ВАЖНОЕ СООБЩЕНИЕ — ВООРУЖЕННЫЕ СИЛЫ СУПЕР-ЗЕМЛИ
                                Свобода. Мир. Демократия.
                                Ваши права граждан Супер-Земли — основы нашей цивилизации.
                                Самого нашего существования.
                                Но война продолжается. И вновь всему, что нас окружает, грозит опасность.
                                Вступите в величайшую армию в истории и сделайте галактику безопасной и свободной.'
        ]);
        Post::create([
            'title' => 'Automatically created post two',
            'user_id' => 1,
            'text_content' => 'Автоматоны наши друзья, мы должны прекратить сражаться'
        ]);
        Post::create([
            'title' => 'zAutomatically created post three',
            'user_id' => 1,
            'text_content' => 'Автоматоны наши друзья, мы должны прекратить сражаться'
        ]);
        Post::create([
            'title' => 'cAutomatically created post four',
            'user_id' => 1,
            'text_content' => 'Автоматоны наши друзья, мы должны прекратить сражаться'
        ]);
        //User::factory(19)->create();
        //Post::factory(500)->create();
        //Comment::factory(1000)->create();
        //Like::factory(2000)->create(); //doesn't work
    }
}
