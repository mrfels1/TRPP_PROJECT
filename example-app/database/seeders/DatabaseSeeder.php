<?php

namespace Database\Seeders;

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
        //User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Post::create([
            'title' => 'Automatically created post',
            'tags' => 'Helldivers, Test post',
            'author_id' => 1,
            'upvotes'   => 9999,
            'downvotes' => '1',
            'text_content' => 'ВАЖНОЕ СООБЩЕНИЕ — ВООРУЖЕННЫЕ СИЛЫ СУПЕР-ЗЕМЛИ
                                Свобода. Мир. Демократия.
                                Ваши права граждан Супер-Земли — основы нашей цивилизации.
                                Самого нашего существования.
                                Но война продолжается. И вновь всему, что нас окружает, грозит опасность.
                                Вступите в величайшую армию в истории и сделайте галактику безопасной и свободной.'
        ]);
        Post::create([
            'title' => 'Automatically created post two',
            'tags' => 'Helldivers, Test post',
            'author_id' => '1',
            'upvotes'   => 0,
            'downvotes' => 999,
            'text_content' => 'Автоматоны наши друзья, мы должны прекратить сражаться'
        ]);
        Post::factory(5)->create();
    }
}
