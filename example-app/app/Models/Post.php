<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
