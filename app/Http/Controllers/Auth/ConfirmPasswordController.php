<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use App\Traits\RedirectHomeTrait as RedirectTo;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    // Utiliza redirectTo() del helper RedirectTo
    // para redirigar de acuerdo a si es admin o writer
    use RedirectTo;
    protected function redirect()
    {
        $this->redirectTo();
    }    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
