<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'title',
            'user_id',
            'body'
        ];

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(Comment::class);
    }

    public function upvote(): int
    {
        return DB::table('post_vote')->where('post_id',$this->id)->count();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
