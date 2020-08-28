<?php

namespace App\Http\Controllers;

use App\Helpers\CollectionHelper;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('name', 'slug')
            ->get();

        $articles = Article::select('title', 'slug', 'image_path', 'excerpt', 'created_at')
            ->where('published', '=', 1)
            ->latest()
            ->limit(8)
            ->get();
        
        return view('home', compact('categories', 'articles'));
        // return compact('categories', 'articles');
    }

    public function getProfile(User $user)
    {
        $articles = $user
                        ->articles()
                        ->select('title', 'slug', 'image_path', 'excerpt')
                        // ->where('published', '=', 1)
                        ->get();
                        
        $articles = CollectionHelper::paginate($articles, 6);

        return compact('user', 'articles');
    }

    public function getArticle(User $user, Article $article)
    {
        return compact('user', 'article');
    }
}
