<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        if (Auth::guard('magang')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            return redirect('/')->with(['warning' => 'NIM / Password Salah']);
        }        
    }

    public function proseslogout()
    {
        if(Auth::guard('magang')->check()) {
            Auth::guard('magang')->logout();
            return redirect('/');
        }
    }
}
