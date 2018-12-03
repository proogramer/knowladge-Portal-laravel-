<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Session;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.user-register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $rules=[
            'first_name'=>'required|min:4',
            'last_name'=>'required|min:4',
            'email'=>'required|unique:users|email',
            'phone'=>'required|unique:users|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
            'password'=>'required|min:6|max:30|regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/',
            'confirm_password'=>'required||min:6|max:30|required_with:password|same:password'
        ];
        $custome_message=[
            'first_name.required'=>'Please enter the first name',
            'first_name.min:4'=>'First name must be atleast 4 character',
            'last_name.required'=>'Please enter the last name',
            'last_name.min:4'=>'Last name must be atleast 4 character',
            'email.required'=>'Please enter the email ',
            'email.unique'=>'E-mail already exist',
            'email.email'=>'Invalid email',
            'phone.required'=>'Please enter the phone number ',
            'phone.unique'=>'Phone number  already exist',
            'phone.email'=>'Invalid number',
            'password.required'=>'Please enter the password',
            'password.min:6'=>'Password must be atleast 6 character',
            'password.max:30'=>'password max 30 charcter long',
            'password.regex'=>'Password must contain at least a number, and at least a special  and between 6-16 character ',
            'confirm_password.required'=>'Please enter the confirm password',
            'confirm_password.min:6'=>'Confirm password must be atleast 6 character',
            'confirm_password.max:30'=>'Confirm password max 30 charcter long',
            'confirm_password.required_with'=>'Confirm password must be same as password',
        ];
        $this->validate($request,$rules,$custome_message);

        //if successfully
        $name=$request->input('first_name')." ".$request->input('last_name');
        $user=new User;
        $user->name=$name;
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        $user->password=Hash::make($request->input('password'));
        $user->save();
        if($user){
            Session::flash('success', "Registration Successfully!! Please login into your account!!");
            return redirect()->route('login');
        }
        //else back
        Session::flash('error', "Something went wrong!! Please try after some time!!");
        return redirect()->back()->withInput($request->only('first_name','last_name','email','phone_number'));



//        $this->validator($request->all())->validate();
//
//        event(new Registered($user = $this->create($request->all())));
//
//        $this->guard()->login($user);
//
//        return $this->registered($request, $user)
//                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
