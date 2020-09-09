<?php

namespace App\Http\Controllers\Writer;

use App\Helpers\CollectionPagerHelper as CollectionPager;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Traits\ModelQueryTrait as ModelQueries;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    use ModelQueries;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header_categories = $this->getCategoriesForHeader();

        $articles = Article::select('title', 'slug', 'image_path','summary', 'published')
            ->where('user_id', '=', Auth::user()->id)
            ->latest()
            ->paginate(6);

        return view('writer.articles.index', compact('header_categories', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header_categories = $this->getCategoriesForHeader();

        $categories_for_article = Category::pluck('name', 'id');
        
        return view('writer.articles.create', compact('header_categories', 'categories_for_article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {

        if($request->hasFile('image_path')) {

            // Subir la imagen
            $image = $request->file('image_path');

            Image::make($image)
                    ->resize(300, 300);

            $image_path = asset( 'storage/' . Storage::disk('public')->put('img/articles', $image) );
            
        }
        else {
            $image = "img/black_background.jpg";
            
            $image_path = asset($image);
        }

        $article = new Article(
            [
                'title'         => $request->get('title'),
                'slug'          => $request->get('slug'),
                'image_path'    => $image_path,
                'summary'       => $request->get('summary'),
                'text'          => $request->get('text'),
                'published'     => $request->get('published'),
                'user_id'       => Auth::user()->id,
                'category_id'   => $request->get('category_id')
            ]);
    

        $article->save();
        
        return redirect()
                ->route('writer.articles.index')
                ->with('success', 'Artículo creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // $this->authorize('pass', $article);

        return compact('article');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('pass', $article);

        $header_categories = $this->getCategoriesForHeader();

        $categories_for_article = Category::pluck('name', 'id');
        
        return view('writer.articles.edit',compact('header_categories', 'article', 'categories_for_article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, Article $article)
    {
        if($request->hasFile('image_path')) {

            // Subir la imagen
            $image = $request->file('image_path');

            Image::make($image)
                    ->resize(300, 300);

            $image_path = asset( 'storage/' . Storage::disk('public')->put('img/articles', $image) );
            
            $article->image_path = $image_path;
        }

        // Almacenar y actualizar los datos
        $article->title         = $request->get('title');
        $article->slug          = $request->get('slug');
        $article->summary       = $request->get('summary');
        $article->text          = $request->get('text');
        $article->published     = $request->get('published');
        $article->user_id       = Auth::user()->id;
        $article->category_id   = intval($request->get('category_id'));
    
        // return compact('article');
        $article->update();

        return redirect()->route('writer.articles.show', $article->slug);
    }

    
    
    
    
    
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
