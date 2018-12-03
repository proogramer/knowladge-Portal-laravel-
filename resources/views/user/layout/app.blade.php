<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- BOOTSTRAP STYLES-->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
        <!-- FILE UPLOAD STYLES-->
        <link href="{{ asset('css/bootstrap-fileupload.min.css') }}" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="{{ asset('css/basic.css') }}" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- CKEDITOR SCRIPT-->
        <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

        <title>User Panel</title>
    </head>
    <body>
    <div id="wrapper">
        @include('user.inc.navbar')
            @yield('content');
        @include('user.inc.footer')
    </div>
    </body>
</html>