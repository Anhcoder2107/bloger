<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();

        $email = $user->email;
        $name = $user->user_name;
        setcookie("name", $name);

        return view('home');
    }

    // Page User

    public function personalPage(string $email, Request $request)
    {
        
        
        if ($request->getMethod() == 'PATCH') {
            $user = DB::table('users')  ->where('email', $email)
                                        ->update([  
                                                    'first_name'=>$request->first_name,
                                                    'last_name' => $request->last_name,
                                                    'gender' => $request->gender,
                                                    'birthday' => $request->birthday,
                                                    'phone' => $request->phone,
                                                    'country' => $request->country,
                                                ]);
            $user = Auth::user();                                 
            return view('blog/user', ['user' => $user]);
        }
        

        if($request->getMethod() == 'GET'){
            $user = Auth::user();
            return view('blog/user', ['user' => $user]);
        }
    }


}
