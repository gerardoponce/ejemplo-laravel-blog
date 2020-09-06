<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Article;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

// Aqui se pondran todas las funciones pertenencientes al writer
// como actualizacion de perfil, ver perfil, etc

class WriterController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    public function edit() 
    {
        return view('writer.config');
    }

    public function updateProfile(UpdateProfileRequest $request) {

        // Obtener el usuario autentificado
        $user = Auth::user();

        // Almacenar y actualizar los datos
        $user->name         = $request->get('name');
        $user->last_name    = $request->get('last_name');
        $user->username     = $request->get('username');
        $user->email        = $request->get('email');
        $user->description  = $request->get('description');

        if($request->hasFile('image_path')) {

            // Subir la imagen
            $image = $request->file('image_path');

            Image::make($image)
                    ->resize(300, 300)->save($image);

            $image_path = 'storage/' . Storage::disk('public')->put('img/profiles', $image);
            
            $user->image_path = $image_path;
        }

        $user->update();

        return redirect()->route('writer.profile.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
