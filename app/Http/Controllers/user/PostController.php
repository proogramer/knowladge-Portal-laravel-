<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //This function is used for view the add post page
    public function add_post(){
        //
        return view('user.post.add_post');
    }
    //This function is used for store the post values with all validations
    public function add_post_store(Request $request){
        //Validation
        $rules=[
            'title'=>'required|max:50|min:200',
            'category'=>'required',
            'description'=>'required|min:1000|max:2000',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:50000'
        ];
        $message=[
            'title.required'=>'Please enter the title',
            'title.max'=>'Title must be maximum 50 character',
            'title.min'=>'Title atleast 20 character',
            'category.required'=>'Please Select the category',
            'description.required'=>'Please enter the description',
            'description.min'=>'Description atleast 1000 character',
            'description.max'=>'Description must be maximum 5000 character',
            'image.required'=>'Please select the image',
            'image.mimes'=>'Invalid Image',
            'image.max'=>'Image  must be maximum 100000 kb',

        ];
        $this->validate($request,$rules,$message);
    }

    //This function is used for view the post listing page
    public function list_post(){
        return view('user.post.list_post');
    }
    //This function is used for view the edit post page
    public function edit_post(){
        return view('user.post.edit_post');
    }
    //This function is used for store the edit value with all kind of  validation.
    public function edit_post_store(){
        return true;
    }
    //This function is used for soft delete the post by the user.
    public function delete_post(){
        return true;
    }

}
