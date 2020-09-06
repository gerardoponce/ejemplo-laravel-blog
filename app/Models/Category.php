<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Para usar el implicit binding y en la ruta el slug en vez del id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'name', 'slug', 'image_path', 'description',
    ];

    // Relacion uno a muchos con Article
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
