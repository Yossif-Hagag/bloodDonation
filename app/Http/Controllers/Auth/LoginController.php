<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

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

    public function showLoginForm()
    {
        if (request()->has('id') && request()->filled('id')) {
            redirect()->setIntendedUrl(route('choosenPostALogin', request('id')));
        }

        return view('auth.login');
    }


    protected function authenticated(Request $request, $id){

        if (auth('web')->user()){
            return redirect()->intended(route('donorProfile'));
        }
    
    }

    protected function credentials(Request $request) {
        
        return [
            'email' => $request->email,
            'password' => $request->password,
            'disable' => 0
        ];
    }


}
