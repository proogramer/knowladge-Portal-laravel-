<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('index',compact('posts'));
    }
    public  function view_post($title){
        $title=str_replace("-", " ", $title);
        $post=Post::where('title',$title)->first();
        if($post) {
            $categories=Category::all();
            Session::put('edit_post_id', $post->id);
            return view('v_post',compact('post','categories'));
        }
        else{
            echo "wrong";
        }
    }
}
