<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //This function is used for view the add post page
    public function add_post(){
        $categories=Category::all();
        return view('user.post.add_post',compact('categories'));
    }
    //This function is used for store the post values with all validations
    public function add_post_store(Request $request){
        //Validation
        $rules=[
            'title'=>'required|max:200|min:5',
            'category'=>'required',
            'description'=>'required|min:1000|max:2000',
            'image'=>'required'
        ];
        $message=[
            'title.required'=>'Please enter the title',
            'title.max'=>'Title must be maximum 50 character',
            'title.min'=>'Title atleast 5 character',
            'category.required'=>'Please Select the category',
            'description.required'=>'Please enter the description',
            'description.min'=>'Description atleast 1000 character',
            'description.max'=>'Description must be maximum 5000 character',
            'image.required'=>'Please select the image'
        ];
        $this->validate($request,$rules,$message);
        //Insert into database
        $post=new Post();
        $post->title=$request->input('title');
        $post->category_id=$request->input('category');
        $post->description=$request->input('description');
        $post->image=$request->input('image');
        $post->user_type='U';
        $post->user_id=Auth::user()->id;
        $post->save();

        //return to the Add Page after adding the value in the database
        Session::flash('success', "Add Post Successfully!!");
        return redirect()->back();

    }

    //This function is used for view the post listing page
    public function list_post(){
        $posts=Post::where('user_id',Auth::user()->id)->get();
        return view('user.post.list_post',compact('posts'));
    }
    //This function is used for view the edit post page
    public function edit_post($title){
        $title=str_replace("-", " ", $title);
        $post=Post::where('title',$title)->first();
        if($post) {
            $categories=Category::all();
            Session::put('edit_post_id', $post->id);
            return view('user.post.edit_post',compact('post','categories'));
        }
        else{
            echo "wrong";
        }
    }
    //This function is used for store the edit value with all kind of  validation.
    public function edit_post_store(Request $request){
        //Validation
        $rules=[
            'title'=>'required|max:200|min:5',
            'category'=>'required',
            'description'=>'required|min:1000|max:2000',
            'image'=>'required'
        ];
        $message=[
            'title.required'=>'Please enter the title',
            'title.max'=>'Title must be maximum 50 character',
            'title.min'=>'Title atleast 5 character',
            'category.required'=>'Please Select the category',
            'description.required'=>'Please enter the description',
            'description.min'=>'Description atleast 1000 character',
            'description.max'=>'Description must be maximum 5000 character',
            'image.required'=>'Please select the image'
        ];
        $this->validate($request,$rules,$message);
        //Update the Post Values
        $post = Post::find(Session::get('edit_post_id'));
        $post->title=$request->input('title');
        $post->category_id=$request->input('category');
        $post->description=$request->input('description');
        $post->image=$request->input('image');
        $post->user_type='U';
        $post->user_id=Auth::user()->id;
        $post->save();
        // Make session and redirect back
        Session::flash('success', "Edit Post Successfully");
        return redirect()->back();
    }
    //This function is used for soft delete the post by the user.
    public function delete_post(){
        $post = Post::find($_POST['id']);
        $post->delete();
        if($post){
            Session::flash('success', "Delete Post Successfully!!");
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
