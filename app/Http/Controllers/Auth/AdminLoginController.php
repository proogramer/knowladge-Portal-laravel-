<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function ShowLoginForm(){
        return view('auth.admin-login');
    }
    public function login(Request $request){
        //validation
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        //Attempt to log the user in
        if(Auth::guard('admin')->attempt(['email' =>$request->email,'password'=>$request->password],$request->remember)){
            Session::flash('success', "Successfull Login!!");
            return redirect()->intended(route('admin-panel.dashboard'));
        }
        Session::flash('error', "Invalid Username and Password!!");
            //else back
            return redirect()->back()->withInput($request->only('email','remember'));
    }
}
