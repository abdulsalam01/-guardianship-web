<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function authenticate()
    {
        $credentials = request()->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->roles == 'admin') {
                return redirect()->intended('admin');
            } elseif (Auth::user()->roles == 'student') {
                return redirect()->intended('user');
            } else {
                return redirect()->intended('user');
            }
        } else {
            return back()->with('error', 'Login gagal');
        }
    }
}
