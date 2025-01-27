<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Head Start -->
    <x-frontend.head />

    @stack('styles')
</head>

<body>
    {{-- Pre Loader Start --}}
    <x-frontend.loader />
    {{-- Pre Loader End --}}

    <!-- Header Start -->
    <x-frontend.header />
    <!-- Header End -->

    <!-- Start Main Menu Area -->
    <x-frontend.main-menu />
    <!-- End Main Menu Area -->

    <!-- Start Main Content  -->
    @yield('content')
    <!-- End Main Content  -->    

    <!-- Footer Start -->
    <x-frontend.footer />
    <!-- Footer End -->

    <!-- back to top area start -->
    <x-frontend.back-to-top />
    <!-- back to top area end -->

    <!-- Start Main JS  -->
    <x-frontend.main-js />
    <!-- End Main JS  -->

    {{-- Custom Js --}}
    @stack('scripts')
</body>

</html>
