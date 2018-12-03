@extends('user.layout.app')
@section('content')
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
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
                            <form role="form" method="post" action="{{ route('user-panel.add-post.submit') }}">
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
                                    <select class="form-control">
                                        <option value="" selected>Select Category</option>
                                        <option>Two Vale</option>
                                        <option>Three Vale</option>
                                        <option>Four Vale</option>
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="description" name="description" class="form-control" rows="3"></textarea>
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
                                                <img src="{{ asset('img/demoUpload.jpg') }}" alt="" />
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