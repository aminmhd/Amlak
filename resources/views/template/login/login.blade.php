<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('template/login/images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('template/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('template/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/login/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('template/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('template/login/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('template/login/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/login/css/main.css') }}">
    {{--notification--}}
    <link href="{{ asset('panel/vendors/cdn/toastr.min.css') }}" rel="stylesheet">
    <!--===============================================================================================-->


</head>
<body>

<div class="limiter" >
    <div class="container-login100" >
        <div class="wrap-login100">
            <form method="post" action="" class="login100-form validate-form">
                @csrf
					<span class="login100-form-title p-b-34">
						Account Login
					</span>

                <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                    <input  class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign in
                    </button>
                </div>

                <div class="w-full text-center p-t-27 p-b-239">
			{{--			<span class="txt1">
							Forgot
						</span>

                    <a href="#" class="txt2">
                        User name / password?
                    </a>--}}
                </div>
            </form>

            <div class="login100-more"
                 style="background-image: url({{ asset('template/login/images/12.jpg') }});"></div>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>


<script src="{{ asset('template/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('template/login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('template/login/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('template/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('template/login/vendor/select2/select2.min.js') }}"></script>
<script>
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script src="{{ asset('template/login/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('template/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('template/login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('template/login/js/main.js') }}"></script>
{{--notification--}}
<script src="{{ asset('panel/vendors/cdn/toastr.min.js') }}"></script>
@include('notification.notification')

</body>
</html>
