<?php

namespace App\Traits;

use App\Providers\RouteServiceProvider;

// Trait de donde llamar funciones que son reutilizables en varios controladores
trait RedirectTo
{
    // Te redirige al home de segun el rol del usuario
    public function redirectTo () {

        if (auth()->user()->getRoleNames()->first() == 'admin') {
            
            return $redirectTo = RouteServiceProvider::ADMIN_HOME;
        
        }

        elseif (auth()->user()->getRoleNames()->first() == 'writer') {

            return $redirectTo = RouteServiceProvider::WRITER_HOME;
        
        }
    }
}