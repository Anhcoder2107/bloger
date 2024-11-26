<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('user.auth.register');
        }

        
        if ($request->getMethod() == 'POST') {
            $User = new User;
            $User->user_name = $request->name; 
            $User->email = $request->email;
            $User->password = $request->password;

            $User->save();
            return redirect()->route('login');
        } else {
            return redirect()->route('register');
        }
    }

    
}
