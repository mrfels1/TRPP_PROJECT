<?php

namespace App\Models;

class Post
{
    //Все посты (хардкод)
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Post one',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero quisquam dolorem molestias ipsam dolore quas labore! Amet rem sed quam. 
                    Fugit nemo vero illum veniam, placeat sunt voluptatibus maxime id.',
            ],
            [
                'id' => 2,
                'title' => 'Post two',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero quisquam dolorem molestias ipsam dolore quas labore! Amet rem sed quam. 
                    Fugit nemo vero illum veniam, placeat sunt voluptatibus maxime id.',
            ],
            [
                'id' => 3,
                'title' => 'Post three',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero quisquam dolorem molestias ipsam dolore quas labore! Amet rem sed quam. 
                    Fugit nemo vero illum veniam, placeat sunt voluptatibus maxime id.',
            ]
        ];
    }
    //Один пост по id
    public static function find($id)
    {
        $posts = self::all();

        foreach ($posts as $post) {
            if ($post['id'] == $id) {
                return $post;
            }
        }
    }
}
