<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,500,600,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <main-page-component></main-page-component>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
