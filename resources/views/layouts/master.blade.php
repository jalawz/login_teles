<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Teles Lojas Web</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <style>
            body { font-family: 'Raleway', sans-serif; }
        </style>
    </head>
    <body>
        @include('layouts.partials.navigation')
        <div class="container">
            @include('layouts.partials.alerts')
            @yield('content')
        </div>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
