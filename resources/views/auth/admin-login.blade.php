@extends('layout.app')

@section('content')
    <div style="background-color: #E2E2E2;">
        <div class="container">
            <div class="row text-center " style="padding-top:100px;">
                <div class="col-md-12">
                    <h1>Admin Login</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-10 offset-sm-1 text-center">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin-panel.login.submit') }}">
                            {{ csrf_field() }}
                            <hr />
                            <h5>Enter Details to Login</h5>
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"  ></i></span>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Your E-mail " />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" name="password" id="password" class="form-control"  placeholder="Your Password" />
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Remember me
                                </label>
                                <span class="pull-right">
                                                   <a href="index.html" >Forget password ? </a>
                                            </span>
                            </div>

                            <a href="index.html" class="btn btn-primary ">Login Now</a>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection