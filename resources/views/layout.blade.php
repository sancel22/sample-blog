<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Laravel: Blog</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    @yield('header')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    @yield('footer')
</body>
</html>