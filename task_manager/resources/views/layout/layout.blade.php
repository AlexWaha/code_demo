<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.projectname'))</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="theme-color" content="#ffffff">
    <meta name="referrer" content="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts/fontawesome/css/all.min.css') }}">
    <script src="{{ asset('js/jquery/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="@yield('body_class')">
<div id="app" class="app_container">
    @if(!Route::is('auth'))
        <div class="app_left_container">
            @include('layout.navbar')
        </div>
    @endif
    <div class="app_right_container">
        @include('layout.header')
        <main id="content" class="container-fluid p-4">
            @yield('content')
        </main>
        @include('layout.footer')
    </div>
        @yield('scripts')
</div>
</body>
</html>
