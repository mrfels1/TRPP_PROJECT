<?php

namespace App\Models;

use App\Models\Scopes\WithLikes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[ScopedBy([WithLikes::class])]
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'tags', 'text_content', 'user_id']; // FIXME: user_id как fillable это опасная уязвимость, исправить

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getUserName()
    {
        return User::find($this->user_id)->name;
    }




    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id()
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $this->likes()->where('user_id', $user->id)->where('post_id', $this->id)->where('liked', true)->exists();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $this->likes()->where('user_id', $user->id)->where('post_id', $this->id)->where('liked', false)->exists();
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
