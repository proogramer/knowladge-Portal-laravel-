@extends('layout.app')

@section('content')
    <div style="background-color: #E2E2E2;">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <h1>User Registration</h1>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-sm-10 offset-sm-1 text-center">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <hr />
                            <h5>Enter Details to Register</h5>
                            <br />
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Your First Name " />
                                <div class="col-sm-4">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Your Last Name " />
                                <div class="col-sm-4">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Your E-mail" />
                                <div class="col-sm-4">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" />
                                <div class="col-sm-4">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" />
                                <div class="col-sm-4">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                                <div class="col-sm-4">
                                    @if ($errors->has('confirm_password'))
                                        <span class="help-block">
                                            <strong  style="font-size: 10px; color: red; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; ">{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" id="submit" value="Register" class="btn btn-primary ">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection