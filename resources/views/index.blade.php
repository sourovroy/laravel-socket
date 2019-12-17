<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <title>Simple Chat App</title>
</head>
<body>
    <div id="app"></div>

    <!-- JavaScript -->
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
