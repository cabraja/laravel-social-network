<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social.io | @yield('title')</title>
        @vite(['resources/js/app.js'])
    <script src="{{asset('js/main.js')}}"></script>
    <link href="/css/main.css" rel="stylesheet">
</head>

<style>
    @font-face {
        font-family: Main;
        src: url('{{asset('fonts/Main.ttf')}}');
    }
    body{
        font-family: Main !important;
    }
</style>

<body id="body">

@include('includes.header')

@yield('content')


</body>
<script src="https://kit.fontawesome.com/25d233a38a.js" crossorigin="anonymous"></script>
</html>
