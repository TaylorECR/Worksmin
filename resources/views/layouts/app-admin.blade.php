<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Agenda Minera Perú | Admin') }}</title>

    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="{{asset('admin.assets/css/main.css')}}" rel="stylesheet"></head>

    @stack('styles')

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app">

        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

            @include('admin.components.header')

            @include('admin.components.options')

            <div class="app-main">

                @include('admin.components.sidebar')   

                <div class="app-main__outer">

                    <div class="app-main__inner">

                        @yield('content')

                    </div>

                    @include('admin.components.footer') 

                </div>  

            </div>

        </div>
        
    </div>
    
    <script type="text/javascript" src="{{asset('admin.assets/scripts/main.js')}}"></script></body>

    @stack('scripts')
</body>
</html>
