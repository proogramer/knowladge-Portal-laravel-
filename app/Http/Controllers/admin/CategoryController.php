<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Category;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }
    //This function is used for view the add post page
    public function add_category(){
        return view('admin.category.add_category');
    }
    //This function is used for store the post values with all validations
    public function add_category_store(Request $request){
        //Validation
        $rules=[
            'category'=>'required|max:15',
        ];
        $message=[
            'category.required'=>'Please enter the category',
            'category.max'=>'Category must be max 15 character',

        ];
        $this->validate($request,$rules,$message);
        //if Already Exist category Validation
        $categorey=Category::where('category',$request->input('category'))->first();
        if(!$categorey) {
            //store the values in database
            $category = new Category();
            $category->category = $request->input('category');
            $category->user_id = Auth::guard('admin')->user()->id;
            $category->user_type = 'A';
            $category->save();

            //return to the Add Page after adding the value in the database
            Session::flash('success', "Add Category Successfully!!");
            return redirect()->back();
        }
        else{
            Session::flash('error', "Already Exist This Category!!");
            return redirect()->back();
        }

    }

    //This function is used for view the post listing page
    public function list_category(){
        //get the the category data
        $categories=Category::all();
        return view('admin.category.list_category',compact('categories'));
    }
    //This function is used for view the edit post page
    public function edit_category(){
        $id=$_POST['id'];
        $categorey=Category::where('id',$id)->first();
        echo json_encode($categorey);
    }
    //This function is used for store the edit value with all kind of  validation.
    public function edit_category_store(Request $request){
        //Validation
        $rules=[
            'edit-category'=>'required|max:15',
        ];
        $message=[
            'edit-category.required'=>'Please enter the category',
            'edit-category.max'=>'Category must be max 15 character',

        ];
        $this->validate($request,$rules,$message);
        //Update the Category Values
        $category = Category::find($_POST['category-id']);

        $category->category = $_POST['edit-category'];

        $category->save();
        Session::flash('success', "Edit Category Successfully");
        return redirect()->back();
    }
    //This function is used for soft delete the post by the admin.
    public function delete_category(){
        $category = Category::find($_POST['id']);
        $category->delete();
       if($category){
           Session::flash('success', "Delete Category Successfully!!");
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
