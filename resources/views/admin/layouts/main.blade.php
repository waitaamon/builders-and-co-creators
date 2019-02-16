<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Builders and co creators">
    <meta name="author" content="Amon waita gathoka : waitaamon@hotmail.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Builders & Co-Creators') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">
<div id="app">
    @yield('content')
</div>
<!--core JavaScript-->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/admin.js') }}"></script>

</body>
</html>
