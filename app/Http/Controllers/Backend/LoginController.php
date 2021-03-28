<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function LoginForm()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        $cred = $request->only('email', 'password');
        if (\auth()->attempt($cred)) {
           return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
