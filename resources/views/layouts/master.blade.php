<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">  -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Suntech')</title>
    <!-- <meta property="og:image" content="@yield('og_image', asset("/assets/images/logo.png"))"/> -->
    <meta property="og:url" content="{!! url()->current() !!}">    
    <meta property="og:type" content="website">    
    <meta property="og:title" content="@yield('og_title', 'suntech.com')">    
    <meta property="og:description" content="@yield('og_description', 'suntech.com')">    

    <!-- Styles -->
    @section('head')
        <link href="{{ asset('assets/dist/app.css') }}" rel="stylesheet">   
    @show
</head>

<body>
    <div class="super_container">
        @include('partials.header')
        @include('partials.menu')

        @yield('content')

        @include('partials.footer')
    </div>
    
    @section('foot')
        <script src="{{ asset('assets/dist/app.js') }}"></script>
    @show
</body>
</html>