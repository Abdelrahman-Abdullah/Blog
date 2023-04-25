<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;


    // To Prevent N+1 Problems
    protected $with = ['author'];
    protected $guarded = [];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);

    }
    public function author(): BelongsTo
    {
        // We Defined The Key Because  Laravel use function name to define the key name [author_id]
        // But the Class called user not author ,so we should define the key manual
        return $this->belongsTo(User::class , 'user_id');
    }
}

