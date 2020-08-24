<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Para poder usar los roles en el modelo
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    // Para usar el implicit binding y en la ruta el nickname en vez del id
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'username', 'email', 'password', 'image_path', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacion uno a muchos con Article
    public function articles() {
        return $this->hasMany(Article::class);
    }

    // Relacion uno a muchos con Comment
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
