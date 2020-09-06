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
            
        $articles = Article::select('title', 'slug', 'image_path as article_image_path', 'summary', 'created_at')
            ->where('published', '=', 1)
            ->latest()
            ->limit(8)
            ->get();

        return view('home', compact('categories', 'articles'));
    }

    public function getProfile(User $user)
    {
        $categories = Category::select('name', 'slug')
            ->get();

        $articles = $user
            ->articles()
            ->select('title', 'slug', 'image_path as article_image_path', 'excerpt')
            ->where('published', '=', 1)
            ->get();
                        
        $articles = CollectionHelper::paginate($articles, 6);

        return view( 'profile',compact('user', 'categories', 'articles') );
    }

    public function getArticle(User $user, Article $article)
    {
        $categories = Category::select('name', 'slug')
            ->get();
        
        return view( 'article',compact('user', 'categories', 'article') );
    }
}
