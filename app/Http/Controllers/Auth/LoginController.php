<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'documento' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        $request->merge([$this->username()=>$request->documento]);

        return $request->only($this->username(), 'password');
    }

    public function username()
    {
        $login = request()->input('documento');

        switch (true) {
            case filter_var($login, FILTER_VALIDATE_EMAIL) :
                $fieldType = 'str_Email'; break;
            case (is_cpf($login)) :
                $fieldType = 'str_Cpf'; break;
            default : $fieldType = 'str_Passaporte';
        }

        return $fieldType;
    }
}
