@props([
    'styles' => [],
    'favicon' => asset("assets/img/favicon.png"),
    'pageTitle' => ''
])
<!--begin::Head-->
<head>
    <title> {{config('app.name')}} - {{$pageTitle}}</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', 'Simple site')" />
    <meta name="keywords" content="@yield('keywords', '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content=""@yield('meta-type', 'Website')" />
    <meta property="og:title" content="{{config('app.name')}} - {{$pageTitle}}" />
    <meta property="og:url" content="@yield('meta-url', config('app.url'))"/>
    <meta property="og:site_name" content="{{config('app.name')}}" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{$favicon}}"/>
    <!--begin::Fonts(mandatory for all pages)-->


    @stack('pre-styles')

    @if(isset($styles) && !blank($styles))
        @foreach($styles as $style)
            <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif

    @stack('styles')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->

