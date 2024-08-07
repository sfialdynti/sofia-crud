<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('/login');
    }

    public function auth(Request $request){
        $validatedata = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($validatedata)) {
            return redirect('user');
        }

        return redirect()->back()->with('statusLogin', 'Maaf login anda gagal');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
