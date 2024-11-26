<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('user.auth.login');
        }

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $emailCookie = $request->email;
            $nameCookie = $request->user_name;
            setcookie("email", $emailCookie);
            setcookie("name", $nameCookie);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
