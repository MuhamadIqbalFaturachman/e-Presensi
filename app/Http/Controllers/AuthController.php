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

    public function prosesloginadmin(Request $request)
    {
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboardadmin');
        } else {
            return redirect('/panel')->with(['warning' => 'Email atau Password salah']);
        }        
    }
}
