@extends('admin.layout.app')
@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            @if (Session::has('success'))
                <div id="success" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div id="error" class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Post</h1>
                    {{--<h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>--}}

                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add Post
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{ route('admin-panel.add-post.submit') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" value="{{ old('title') }}" type="text" id="title" name="title">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Select Example</label>
                                    <select name="category"  class="form-control">
                                        <option value="">Select Category</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                @if( old('category')==$category->id)
                                                    <option selected value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endif
                                                    <option  value="{{ $category->id }}">{{ $category->category }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="description"  name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Image Upload</label>
                                    <div class="">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img  src="{{ asset('img/demoUpload.jpg') }}" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">

                                            </div>
                                            <div>
                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                    <strong style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('image') }}</strong>
                                                     </span>
                                                @endif

                                                <span class="btn btn-file btn-primary">
                                                    <span class="fileupload-new">
                                                        Select
                                                    </span>
                                                    <span class="fileupload-exists">
                                                        Change
                                                    </span>
                                                    <input name="image" id="image" type="file">
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="add_post_submit" type="submit" class="btn btn-info">Add Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()