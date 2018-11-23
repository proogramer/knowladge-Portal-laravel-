@extends('user.layout.app')

@section('content')
    <h1>Admin Panel</h1>
    <div id="page-wrapper">
        @if (Session::has('success'))
            <div id="success" class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div id="error" class="alert alert-success">
                {{ Session::get('error') }}
            </div>
        @endif
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">DASHBOARD</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">

                <div class="col-md-4">
                    <div class="main-box mb-red">
                        <a href="#">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>Zero Issues</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-box mb-dull">
                        <a href="#">
                            <i class="fa fa-plug fa-5x"></i>
                            <h5>40 Task In Check</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-box mb-pink">
                        <a href="#">
                            <i class="fa fa-dollar fa-5x"></i>
                            <h5>200K Pending</h5>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
@endsection
