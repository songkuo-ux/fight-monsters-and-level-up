<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

<div class = 'content'>
    @yield("content")
</div>
</body>
</html>
