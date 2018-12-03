@extends('layout.app')

@section('content')
    <div style="background-color: #E2E2E2;">
        <div class="container">
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
            <div class="row text-center " style="padding-top:100px;">
                <div class="col-md-12">
                    <h1>Admin Login</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-10 offset-sm-1 text-center">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin-panel.login.submit') }}">
                            {!! csrf_field() !!}
                            <hr />
                            <h5>Enter Details to Login</h5>
                            <br />
                            <div class="form-group ">
                                <span class="input-group-addon"><i class="fa fa-envelope"  ></i></span>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Your E-mail " />
                                <div class="col-sm-4">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group ">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" name="password" id="password" class="form-control"  placeholder="Your Password" />
                                <div class="col-sm-4">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Remember me
                                </label>
                                <span class="pull-right">
                                                   <a href="index.html" >Forget password ? </a>
                                            </span>
                            </div>

                            <button  type="submit" class="btn btn-primary">Login Now</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection