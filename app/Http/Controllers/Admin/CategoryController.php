<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CollectionPagerHelper as CollectionPager;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Traits\ModelQueryTrait as ModelQueries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

// El CRUD de solo administrador para categorias
class CategoryController extends Controller
{
    use ModelQueries;
    // Para pruebas 
    // protected function firstLetterUCWord($array, $attribute) {

    //     foreach ($array as $value) {
            
    //         $value->$attribute = ucwords($value->$attribute);
        
    //     }
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header_categories = $this->getCategoriesForHeader();

        $categories = Category::select('name', 'slug', 'description')
            ->orderBy('name', 'ASC')
            ->get();

        // $this->firstLetterUCWord($categories, 'name');

        return view('admin.categories.index', compact('header_categories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        
        if($request->hasFile('image_path')) {

            // Subir la imagen
            $image = $request->file('image_path');

            Image::make($image)
                    ->resize(300, 300);

            $image_path = asset( 'storage/' . Storage::disk('public')->put('img/categories', $image) );
            
        }
        else {
            $image = "img/black_background.jpg";
            
            $image_path = asset($image);
        }

        $category = new Category(
        [
            'name'          => $request->get('name'),
            'slug'          => $request->get('slug'),
            'description'   => $request->get('description'),
            'image_path'    => $image_path
        ]);

        $category->save();
        
        return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Categoría creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $header_categories = $this->getCategoriesForHeader();

        $articles = $category
                        ->articles()
                        ->join('users','user_id','=','users.id')
                        ->select('title', 'slug', 'articles.image_path', 'summary','username')
                        ->get();

        $articles = CollectionPager::paginate($articles, 6);
        // return compact('category', 'articles');
        return view('admin.categories.show', compact('header_categories', 'category', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $header_categories = $this->getCategoriesForHeader();

        return view('admin.categories.edit', compact('header_categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()
                    ->route('admin.categories.index')
                    ->with('success','Categoría actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
  
        return redirect()
                ->route('admin.categories.index')
                ->with('success','Categoría eliminada');
    }
}
