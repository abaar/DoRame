<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="/css/bootstrap-theme.min.css">--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/custom.menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    @yield('style')
    <style>
        body{
            padding-top: 50px;   /*fix navbar padding*/
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>

<body>
@include('master.navbar')
@yield('content')
@include('footer')
<!-- Latest compiled and minified JavaScript -->


<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="tex/javascript" src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
@yield('script')
</body>
</html>