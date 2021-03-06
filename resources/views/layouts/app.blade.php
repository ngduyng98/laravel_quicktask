<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quicktask</title>
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-css/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/popper.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-css/js/bootstrap.min.js') }}"></script>
</head>
<body>
    <div class="container">
        @include('menu')
        @yield('content')
    </div>
</body>
</html>
