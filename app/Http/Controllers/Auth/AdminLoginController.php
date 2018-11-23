<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }
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
            //if successfully
            return redirect()->indended(route('admin.dashboard'));
        }
            //else back
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
