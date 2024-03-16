<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {

        view()->composer('shared.links', function ($view) {
            $view->with('controllerName', 'LoginController');
        });
        return view('auth.login');
    }

    public function login(Request $request)
    {


        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); //remember me

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }


    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

}
