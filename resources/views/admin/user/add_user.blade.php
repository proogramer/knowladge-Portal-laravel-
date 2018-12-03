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
                    <h1 class="page-head-line">User</h1>
                    {{--<h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>--}}

                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add User
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{ route('admin-panel.add-user.submit') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-control" type="text">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control" type="text">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" id="email" value="{{ old('email') }}" class="form-control" type="text">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input name="phone" id="phone" value="{{ old('phone') }}" class="form-control" type="text">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" id="password" class="form-control" type="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input name="confirm_password" id="confirm_password" class="form-control" type="password">
                                    @if ($errors->has('confirm_password'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-info">Add User</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()