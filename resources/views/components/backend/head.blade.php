{{-- Required meta tags --}}
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">

{{-- SEO --}}
<meta name="description" content="J4C Group">
<meta name="keywords" content="J4C Group, J4C, J4C Group">
<meta name="author" content="J4C Group, J4C, J4C Group">

<!-- CSRF Token -->
<meta name="csrf-token" content="content">
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

{{-- Title --}}
<title>@yield('title')</title>

{{-- Favicon --}}
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/logo/fav.png') }}">

<!-- Google font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/font-awesome.css') }}">

<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/icofont.css') }}">

<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/themify.css') }}">

<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/flag-icon.css') }}">

<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/feather-icon.css') }}">

<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/scrollbar.css') }}">
<!-- Range slider css-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/rangeslider/rSlider.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/prism.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/fullcalender.css') }}">
<!-- Plugins css Ends-->

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors/bootstrap.css') }}">

<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('backend/assets/css/color-1.css') }}" media="screen">

<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/responsive.css') }}">

<!-- Toaster Message -->
<script src="{{ asset('toaster/js/jquery.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('toaster/css/toastr.min.css') }}" />
<script src="{{ asset('toaster/js/toastr.min.js') }}"></script>
