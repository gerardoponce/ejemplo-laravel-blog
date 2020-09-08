<?php

namespace App\Helpers;

use App\Providers\RouteServiceProvider;
use Auth;

// Helper para la redireccion a un inicio determinado despues de iniciar sesion
trait RedirectHomeHelper
{
    // Te redirige al home segun el rol del usuario
    public function redirectTo () {

        $role = Auth::user()->getRoleNames()->first();

        if ($role == 'admin') {
            
            return $redirectTo = RouteServiceProvider::ADMIN_HOME;
        
        }

        elseif ($role == 'writer') {

            return $redirectTo = RouteServiceProvider::WRITER_HOME;
        
        }
    }
}