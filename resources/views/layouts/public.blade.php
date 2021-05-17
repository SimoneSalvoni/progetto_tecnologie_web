<!DOCTYPE html>
<html lang "{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link href="{{asset('css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">  
        <link href="{{asset('css/themes/css/main.css')}}" rel="stylesheet"/>
        <!--
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="themes/css/bootstrappage.css" rel="stylesheet"/>
        <link href="themes/css/flexslider.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <script src="resources/js/jquery-1.7.2.min.js"></script>      
        <script src="resources/js/bootstrap.min.js"></script>	
        -->
    </head>
    <body>
        @include('layouts/header')
        @yield('content')
        @include('layouts/footer')
    </body>
</html>