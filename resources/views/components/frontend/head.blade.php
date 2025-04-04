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

{{-- Robots Meta Tags --}}
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

@if(in_array(Route::currentRouteName(), [
    'frontend.home',
    'frontend.about-us',
    'frontend.projects',
    'frontend.project-details',
    'frontend.mission-vision',
    'frontend.contact',
    'frontend.awards-certifications',
    'frontend.our-usp',
    'frontend.sustainability',
    'frontend.careers',
    'frontend.careers-details',
    'frontend.media-events',
    'frontend.media-events-details'
]))
    {{-- Get the slug if available --}}
    @php
        $slug = Route::current()->parameter('slug') ?? '';
        $canonicalUrl = $slug ? url()->current() : Request::url();
    @endphp

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ $canonicalUrl }}" />
@endif

{{-- Title --}}
<title>@yield('title')</title>

{{-- Favicon --}}
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/logo/fav.png') }}">


{{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">

{{-- Google Fonts --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" type="text/css" media="all">

<!-- bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" type="text/css" media="all">

<!-- carousel CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" type="text/css" media="all">

<!-- animate CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}" type="text/css" media="all">

<!-- animated-text CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animated-text.css') }}" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" type="text/css" media="all">

<!-- font-awesome CSS -->
<!-- <link rel="stylesheet" href="css/all.min.css" type="text/css" media="all"> -->

<!-- font-flaticon CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}" type="text/css" media="all">

<!-- theme-default CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/theme-default.css') }}" type="text/css" media="all">

<!-- meanmenu CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.min.css') }}" type="text/css" media="all">

<!-- transitions CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}" type="text/css" media="all">

<!-- venobox CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/venobox.css') }}" type="text/css" media="all">

<!-- bootstrap icons -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-icons.css') }}" type="text/css" media="all">

<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" type="text/css" media="all">

<!-- responsive CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" type="text/css" media="all">

<!-- modernizr js -->
<script src="{{ asset('frontend/assets/js/modernizr-3.5.0.min.js') }}"></script>
