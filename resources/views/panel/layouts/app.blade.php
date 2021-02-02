<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{--@yield('title' , 'panel')--}} panel</title>
    <!-- Bootstrap -->
    <link href="{{ asset('panel/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('panel/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('panel/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('panel/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('panel/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
          rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('panel/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('panel/build/css/custom.min.css') }}" rel="stylesheet">
    {{--notification--}}
    <link href="{{ asset('panel/vendors/cdn/toastr.min.css') }}" rel="stylesheet">
    {{-- /*******************************  attach css files *************************************/--}}
    @yield('header')


</head>
<body class="nav-md" style="background: #2A3F54 !important">

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                </div>
                <div class="clearfix"></div>
                <div class="profile clearfix">
                    <img src="{{ asset('panel/images/logo/img3.png') }}"
                         style="width: 100px;height: 100px;margin-left: 54px;">
                </div>
                @include('panel.sidebar.nav')
            </div>
        </div>
        @php
         $user =   \Illuminate\Support\Facades\Auth::user();
            @endphp

        @include('panel.sidebar.top-nav' , [$user])
        <div class="right_col" role="main">
            <div class="">
                @yield('content')
            </div>
        </div>

        <footer>
            <div class="pull-right">
                Laravel Admin <a href="https://Bytino.net">Bytino</a>
            </div>
            <div class="clearfix"></div>
        </footer>
    </div>
</div>


<!-- jQuery -->
<script src="{{ asset('panel/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('panel/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('panel/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('panel/vendors/nprogress/nprogress.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('panel/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('panel/vendors/iCheck/icheck.min.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('panel/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('panel/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('panel/build/js/custom.min.js') }}"></script>
{{--notification--}}
<script src="{{ asset('panel/vendors/cdn/toastr.min.js') }}"></script>
{{--sweet alert--}}
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@include('notification.notification')

{{--/******************************  attach js files  ************************************/--}}
@yield('footer')

</body>
</html>
