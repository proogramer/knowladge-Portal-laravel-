@extends('admin.layout.app')
@section('content')
    <!-- /. NAV SIDE  -->
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
                    <h1 class="page-head-line">Category</h1>
                    {{--<h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>--}}

                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add Category
                        </div>
                        <div class="panel-body">
                            <form method="post" action="{{ route('admin-panel.add-category.submit') }}" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Category</label>
                                    <input class="form-control" name="category" id="category" type="text">
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" id="add_category" name="add_category" class="btn btn-info">Add Category</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()