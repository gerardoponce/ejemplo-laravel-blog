<?php

namespace App\Traits;

use App\Models\Article;
use App\Models\Category;

trait ModelQueryTrait
{
    private function getCategoriesForHeader() 
    {
        $categories = Category::select('name', 'slug')
            ->get();

        return $categories;
    }
    
    private function getArticlesForHome()
    {
        $articles = Article::select('title', 'slug', 'articles.image_path as article_image_path', 'summary', 'articles.created_at', 'username')
            ->join('users', 'articles.user_id', '=', 'users.id')
            ->where('published', '=', 1)
            ->latest()
            ->limit(9)
            ->get();

        return $articles;
    }

}
