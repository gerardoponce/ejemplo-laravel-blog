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
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('home');
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
            'user_name' => 'required|string|max:255|unique:users,user_name,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'image_path' => 'image',
            'description' => 'nullable|string'
        ]);

        // Almacenar y actualizar los datos
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->description = $request->input('description');

        // Subir la imagen
        $image_path = $request->file('image_path');
        if($image_path) {
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
