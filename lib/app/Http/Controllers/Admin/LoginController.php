<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function getLogin()
    {
    	
    	return view('backend.login');
    	

    }
    public function postLogin(Request $request){

    	$email = $request->input('email');
    	$password = $request->input('password');

    	if (Auth::attempt(['email' => $email, 'password' => $password])) {

			return redirect()->intended("admin/home");    	
    	} else {	
    		
    		return back()->withInput()->with('error','Tài khoản hoặc mật khẩu sai vui long thử lại!');

    	}
    }
    
}
