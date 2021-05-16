<!DOCTYPE html>
<html lang "{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <!-- scripts ???CHEFFAMO???
        <script src="themes/js/jquery-1.7.2.min.js"></script>      
        <script src="bootstrap/js/bootstrap.min.js"></script>	
        -->
    </head>
    <body>
        @include('layouts/header')
        @yield('content')
        @include('layouts/footer')
    </body>
</html>