<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    {{-- SEO --}}
    <meta name="description" content="J4C Group">
    <meta name="keywords" content="J4C Group, J4C, J4C Group">
    <meta name="author" content="J4C Group, J4C, J4C Group">

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/assets/images/logo/fav.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/assets/images/logo/fav.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/assets/images/logo/fav.png') }}" />

    <!-- Title -->
    <title>J4C Group | Login</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">

    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/font-awesome.css') }}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/icofont.css') }}">

    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/themify.css') }}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/flag-icon.css') }}">

    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/feather-icon.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">

    <!-- color css-->
    <link id="color" rel="stylesheet" href="{{ asset('backend/assets/css/color-1.css') }}" media="screen">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/responsive.css') }}">

    <!-- Toaster Message -->
    <script src="{{ asset('toaster/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('toaster/css/toastr.min.css') }}" />
    <script src="{{ asset('toaster/js/toastr.min.js') }}"></script>
    

</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div>
                            <a class="logo" style="align-items: center; justify-content: center; display: flex;" href="{{ route('admin.login') }}">
                                <img class="img-fluid for-dark" src="{{ asset('frontend/assets/images/logo/Jett4-hori-logo-png.png') }}" alt="looginpage" style="height: 100px; width: 200px;">
                                <img class="img-fluid for-light" src="{{ asset('frontend/assets/images/logo/Jett4-hori-logo-png.png') }}" alt="looginpage" style="height: 100px; width: 200px;">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('admin.login.store') }}" aria-label="{{ __('Login') }}" enctype="multipart/form">
                                @csrf

                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>

                                <div class="form-group">
                                    <label class="col-form-label"><b>Email Id : <span class="text-danger">*</span></b></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter Email Id">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><b>Password : <span class="text-danger">*</span></b></label>
                                    <div class="form-input position-relative">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" placeholder="Enter Password">
                                        <div class="show-hide">
                                            <span class="show"> </span>
                                        </div>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <input class="form-check-input" type="hidden" name="remember_token" id="remember_token" value="true">

                                <div class="col-sm-12 pb-3" style="text-align: right;">
                                    @if (Route::has('admin.forget-password.request'))
                                    <a href="{{ route('admin.forget-password.request') }}">
                                        <b>{{ __('Forgot Password?') }}</b>
                                    </a>
                                    @endif
                                </div>

                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100" type="submit">
                                        <i class="fa fa-sign-in"></i>
                                        <b>{{ __('Login') }}</b>
                                    </button>
                                </div>

                                {{-- <p class="mt-4 mb-0 text-center">
                                Don't have account?
                                <a class="ms-2" href="{{ route('admin.register') }}">
                                <b>Sign Up</b>
                                </a>
                                </p> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- latest jquery-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>

    <!-- Plugins JS start-->
    <script src="{{ asset('backend/assets/js/script.js') }}"></script>

    <!-- Toaster JS -->
    <script>
        $(document).ready(function() {
            @if(Session::has('success'))
            toastr.options = {
                "closeButton": true
                , "progressBar": true
            };
            toastr.success("{{ session('success') }}");
            @endif

            @if(Session::has('error'))
            toastr.options = {
                "closeButton": true
                , "progressBar": true
            };
            toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options = {
                "closeButton": true
                , "progressBar": true
            };
            toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options = {
                "closeButton": true
                , "progressBar": true
            };
            toastr.warning("{{ session('warning') }}");
            @endif
        });

    </script>
</body>

</html>

