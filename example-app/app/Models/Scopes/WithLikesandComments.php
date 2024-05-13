<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class WithLikesandComments implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->leftJoinSub(
            'select
        post_id,
        count(liked) filter (where liked = true) as likes,
        count(liked) filter (where liked = false) as dislikes
      from likes
      group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        )->leftJoinSub(
            'select
        post_id,
        count(comments) as comments
      from comments
      group by post_id',
            'comments',
            'comments.post_id',
            'posts.id'
        );
    }
}
