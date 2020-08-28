<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CollectionHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// El CRUD de solo administrador para categorias
class CategoryController extends Controller
{

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
        $categories = Category::select('name', 'slug', 'description')
            ->orderBy('name', 'ASC')
            ->get();

        // $this->firstLetterUCWord($categories, 'name');

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('category.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category(
        [
            'name'          => $request->get('name'),
            'slug'          => $request->get('slug'),
            'description'   => $request->get('description'),
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

        $articles = $category
                        ->articles()
                        ->select('title', 'slug', 'image_path', 'excerpt')
                        ->get();

        $articles = CollectionHelper::paginate($articles, 6);
        // return compact('category', 'articles');
        return view('category.show', compact('category', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
        return view('category.edit', compact('category'));
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
