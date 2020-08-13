<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    // Para usar el implicit binding y en la ruta el slug en vez del id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relacion uno a muchos con articulos
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
