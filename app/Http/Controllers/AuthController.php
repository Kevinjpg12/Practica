<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){

        return view('auth.login');
    }

    public function login_submit(Request $request){
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
            //'isactive'  => 'Y',
        ];
        if (Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }
        return back()->withErrors(['error' => 'Error en credenciales.']);
    }


    public function logout(){
        Session::flush();
        Auth::logout();
        //return Redirect::to(url()); 
    }

}
