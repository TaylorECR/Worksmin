<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Agenda Minera Perú') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon/favicon-32x32.png')}}">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <!--Font Awesome css-->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!--Magnific css-->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!--Owl-Carousel css-->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <!--Animate css-->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <!--Select2 css-->
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <!--Slicknav css-->
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!--Bootstrap-Datepicker css-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
    <!--Jquery UI css-->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
    <!--Perfect-Scrollbar css-->
    <link rel="stylesheet" href="{{asset('assets/css/perfect-scrollbar.min.css')}}">
    <!--Site Main Style css-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!--Responsive css-->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    @stack('styles')

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app">

        @include('partials.shared.header')

        @yield('content')

        @include('partials.shared.footer')

    </div>
    
    <!--Jquery js-->
    <script src="{{asset('assets/js/jquery-3.0.0.min.js')}}"></script>
    <!--Popper js-->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!--Bootstrap js-->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!--Bootstrap Datepicker js-->
    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
    <!--Perfect Scrollbar js-->
    <script src="{{asset('assets/js/jquery-perfect-scrollbar.min.js')}}"></script>
    <!--Owl-Carousel js-->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!--SlickNav js-->
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
    <!--Magnific js-->
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!--Select2 js-->
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <!--jquery-ui js-->
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <!--Jarallax js-->
    <script src="{{asset('assets/js/jarallax.min.js')}}"></script>
    <script src="{{asset('assets/js/jarallax-video.min.js')}}"></script>
    <!--Main js-->
    <script src="{{asset('assets/js/main.js')}}"></script>

    @stack('scripts')
</body>
</html>
