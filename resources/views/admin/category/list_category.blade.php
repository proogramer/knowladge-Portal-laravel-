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
                    <h1 class="page-head-line">Category</h1>
                    {{--<h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>--}}

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!--    Context Classes  -->
                    <div class="panel panel-default">
                        {{--<div class="panel-heading">--}}
                            {{----}}
                        {{--</div>--}}
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($categories)
                                        @php
                                            $id=1
                                        @endphp
                                        @foreach($categories as $categorey)
                                            <tr >
                                                <td>{{ $id }}</td>
                                                <td>{{ $categorey->category }}</td>
                                                <td>{{ $categorey->created_at }}</td>
                                                <td>
                                                    <i title="Edit" onclick="return EditCategoryModelShow({{$categorey->id}})" style="cursor: pointer;" class="fa fa-pencil-square-o" aria-hidden="true"></i> |
                                                    <i style="cursor: pointer;" onclick="return DeleteCategory({{$categorey->id}})" title="Delete" class="fa fa-trash" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            @php
                                                $id++
                                            @endphp
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="panel panel-info">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>

                    <div class="panel-heading">
                        Edit Categorey
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('admin-panel.edit-category.submit') }}" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Category</label>
                            <input class="form-control" name="edit-category" id="edit-category" type="text">
                            <input type="hidden" id="category-id" name="category-id">

                                <span  class="help-block">
                                            <strong id="edit_category_error" style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('edit-category') }}</strong>
                                        </span>

                        </div>
                        <button type="submit" id="edit_category_submit" name="edit_category_submit" class="btn btn-info">Add Category</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection()
<!-- Modal -->
