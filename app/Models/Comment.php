<?php

namespace App\Models;

use Canvas\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable  = ['post_id','user_id','body'];

    public function Post(): BelongsTo
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
