<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Metronic Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('metronic/dist/css/styles.css') }}" rel="stylesheet">
</head>
<body>
@yield('content')

<script src="{{ asset('metronic/dist/js/scripts.js') }}"></script>
<link rel="stylesheet" href="{{ asset('metronic/assets/vendors/base/vendors.bundle.css') }}">
</body>
</html>