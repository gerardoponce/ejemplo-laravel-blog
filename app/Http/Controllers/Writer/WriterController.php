<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
