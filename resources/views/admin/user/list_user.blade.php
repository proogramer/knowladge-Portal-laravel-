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
                    <h1 class="page-head-line">Users</h1>
                    {{--<h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>--}}

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!--    Context Classes  -->
                    <div class="panel panel-default">

                        {{--<div class="panel-heading">--}}
                            {{--Context Classes--}}
                        {{--</div>--}}

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($users)
                                        @php( $id=1)
                                        @foreach($users as $user)
                                            <tr class="success">
                                                <td>{{ $id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    <i title="View" style="cursor: pointer;" onclick="return ViewUserModelOpen({{$user->id}})" class="fa fa-eye"></i> |
                                                    <i title="Edit"style="cursor: pointer;" onclick="return EditUserModelOpen({{$user->id}})"  class="fa fa-pencil-square-o" aria-hidden="true"></i> |
                                                    <i title="Delete" style="cursor: pointer;" onclick="return DeleteUser({{$user->id}})"  class="fa fa-trash" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            @php($id++)
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
        </div>
    </div>
    <!--  View User Model  -->
    <div class="modal fade" id="ViewModel" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="panel panel-info">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>

                    <div class="panel-heading">
                        Categorey
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Name:</td>
                                <td id="view-name"></td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td id="view-email"></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td id="view-phone"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--  Edit User Model  -->
    <div class="modal fade" id="EditUserModel" role="dialog">
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
                    <form method="post" action="{{ route('admin-panel.edit-user.submit') }}" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                                <input class="form-control" name="name" id="edit-name" type="text">
                                <input type="hidden" id="user-id" name="user-id">
                            <span  class="help-block">
                                            <strong id="edit_category_error" style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('name') }}</strong>
                                        </span>

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input readonly class="form-control" name="email" id="edit-email" type="text">
                            <span  class="help-block">
                                            <strong id="edit_category_error" style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('email') }}</strong>
                                        </span>

                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input readonly class="form-control" name="phone" id="edit-phone" type="text">
                            <span  class="help-block">
                                            <strong id="edit_category_error" style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('phone') }}</strong>
                                        </span>

                        </div>
                        <button type="submit" id="edit_user_submit" name="edit_user_submit" class="btn btn-info">Edit User</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection()
