<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //This function is used for view the add user page
    public function add_user(){
        return view('admin.user.add_user');
    }
    //This function is used for store the user values with all validations
    public function add_user_store(Request $request){
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
            Session::flash('success', " User Registration Successfully!!");
            return redirect()->route('admin-panel.add-user');
        }
        //else back
        Session::flash('error', "Something went wrong!! Please try after some time!!");
        return redirect()->back()->withInput($request->only('first_name','last_name','email','phone_number'));
    }
    //This function is used for view the user details in admin panel.
    public function view_user(){
        $id=$_POST['id'];
        $user=User::where('id',$id)->first();
        echo json_encode($user);
    }

    //This function is used for view the user listing page
    public function list_user(){
        $users=User::all();
        return view('admin.user.list_user',compact('users'));
    }
    //This function is used for view the edit user page
    public function edit_user(){
        $id=$_POST['id'];
        $user=User::where('id',$id)->first();
        echo json_encode($user);
    }
    //This function is used for store the edit value with all kind of  validation.
    public function edit_user_store(request $request){
        //Validation
        $rules=[
            'name'=>'required|min:4',

        ];
        $custome_message=[
            'name.required'=>'Please enter the first name',
            'name.min:4'=>'First name must be atleast 4 character',
        ];
        $this->validate($request,$rules,$custome_message);
        //Update the User Values

        $user = User::find($_POST['user-id']);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->phone = $_POST['phone'];
        $user->save();
        Session::flash('success', "Edit User Successfully");
        return redirect()->back();
    }
    //This function is used for soft delete the user by the admin.
    public function delete_user(){
        $user = User::find($_POST['id']);
        $user->delete();
        if($user){
            Session::flash('success', "Delete User Successfully!!");
            $respnse_message=array(
                'status'=>true
            );
        }
        else{
            Session::flash('error', "Something Went Wrong!!");
            $respnse_message=array(
                'status'=>false
            );
        }
        echo json_encode($respnse_message);
    }
}
