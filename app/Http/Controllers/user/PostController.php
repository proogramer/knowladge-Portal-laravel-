<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //This function is used for view the add post page
    public function add_post(){
        return view('user.post.add_post');
    }
    //This function is used for store the post values with all validations
    public function add_post_store(){
        return true;
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
