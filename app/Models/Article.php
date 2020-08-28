<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class Article extends Model
{
    // Para usar el implicit binding y en la ruta el slug en vez del id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title', 'slug', 'image_path', 'excerpt', 'text', 'published', 'user_id', 'category_id'
    ];

    // Relacion muchos a uno con User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relacion muchos a uno con Category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Relacion uno a muchos con Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relacion muchos a muchos con Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
