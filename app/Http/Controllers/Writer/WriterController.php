<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function edit() 
    {
        return view('writer.config');
    }

    public function update(Request $request) {
        // Obtener el usuario autentificado
        $user = auth()->user();
        
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'image_path' => 'image',
            'description' => 'nullable|string'
        ]);

        // Almacenar y actualizar los datos
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->description = $request->input('description');

        // Subir la imagen
        $image_path = $request->file('image_path');
        if($image_path) {
            // Nombre de la imagen
            $image_name = Str::random(10) . $image_path->getClientOriginalName();
            $ruta = storage_path() . '\app\public/' . $image_name;
            Image::make($image_path)
                ->resize(300, 300)->save($ruta);

            $user->image_path = "/storage/".$image_name;
        }

        $user->update();

        return redirect()->route('writer.profile.edit');
    }
}
