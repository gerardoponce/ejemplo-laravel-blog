<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select('title', 'slug', 'image_path','summary')
            ->where('user_id', '=', Auth::user()->id)
            ->paginate(6);

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_for_article = Category::pluck('name', 'id');
        
        return view('article.create', compact('categories_for_article'));
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
                    ->resize(300, 300)->save($image);

            $image_path = 'storage/' . Storage::disk('public')->put('img/articles', $image);
            
        }
        else {
            $image = 'img/black_background.jpg';
            
            $image_path = 'storage/' . Storage::disk('public')->put('img/articles', $image);
        }

        $article = new Article(
            [
                'title'         => $request->get('title'),
                'slug'          => $request->get('slug'),
                'image_path'    => $image_path,
                'summary'       => $request->get('summary'),
                'text'          => $request->get('text'),
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

        $categories_for_article = Category::pluck('name', 'id');
        
        return view('article.edit',compact('article', 'categories_for_article'));
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
                    ->resize(300, 300)->save($image);

            $image_path = 'storage/' . Storage::disk('public')->put('img/articles', $image);
            
            $article->image_path = $image_path;
        }

        // Almacenar y actualizar los datos
        $article->title         = $request->get('title');
        $article->slug          = $request->get('slug');
        $article->summary       = $request->get('summary');
        $article->text          = $request->get('text');
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
