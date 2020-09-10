<?php

namespace App\Http\Controllers;

use App\Helpers\CollectionPagerHelper as CollectionPager;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Traits\ModelQueryTrait as ModelQueries;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ModelQueries;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        // use ModelQueries;
        $header_categories = $this->getCategoriesForHeader();

        $home_articles = $this->getArticlesForHome();
        
        $popular_articles = Article::select('title', 'slug', 'image_path as popular_article_image_path')
            ->latest()
            ->limit(3)
            ->get();

        return view('home', compact('header_categories', 'home_articles', 'popular_articles'));
    }

    
    public function getProfile(User $user)
    {
        // use ModelQueries;
        $header_categories = $this->getCategoriesForHeader();

        $articles = $user
            ->articles()
            ->select('title', 'slug', 'image_path as article_image_path', 'summary')
            ->where('published', '=', 1)
            ->get();
                        
        $articles = CollectionPager::paginate($articles, 6);

        return view( 'profile',compact('user', 'header_categories', 'articles') );
    }

    public function getArticle(User $user, Article $article)
    {
        // use ModelQueries;
        $header_categories = $this->getCategoriesForHeader();
        
        return view( 'article',compact('user', 'header_categories', 'article') );
    }
}
