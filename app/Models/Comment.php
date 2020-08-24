<?php

namespace App\Models;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text', 'article_id', 'user_id',
    ];

    // Relacion muchos a uno con Article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Relacion muchos a uno con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
