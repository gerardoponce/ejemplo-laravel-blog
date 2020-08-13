<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// falta mas cosas
class Comment extends Model
{
    protected $fillable = [
        'text', 'article_id', 'user_id',
    ];
}
