<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'text', 'user_id', 'category_id'
    ];

    // Para usar el implicit binding y en la ruta el slug en vez del id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
