<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    

    public function login(RequestLogin $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('site.auth.login');
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Vui lòng điền email',
            'email.email' => 'Email sai định dạng',
            'password.required' => 'Vui lòng điền mật khẩu'
        ]);
        
       
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials,$request->has('remember-me'))) {             
            return  redirect()->route('site.home');
        } else {
            return redirect()->back()->withInput();
        }    
          
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('web.login');
    }
   
}
