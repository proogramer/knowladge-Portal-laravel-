@extends('admin.login.layout.app')

@section('content')
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
               <h1>User Panel</h1>
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div class="panel-body">
                    <form role="form">
                        <hr />
                        <h5>Enter Details to Login</h5>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"  ></i></span>
                            <input type="text" class="form-control" placeholder="Your E-mail " />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" class="form-control"  placeholder="Your Password" />
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
@endsection