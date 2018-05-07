<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/daterange.css" />
</head>

<body>
 @yield('content')

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/js/background-slide-show.js"></script>
<script type="text/javascript" src="/js/momen.js"></script>
<script type="text/javascript" src="/js/daterange.js"></script>

@yield('script')
</body>
</html>