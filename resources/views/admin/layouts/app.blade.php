<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/site.webmanifest')}}">
    @livewireStyles
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <style>
    [x-cloak] {
        display: none !important;
    }
    </style>
    @stack("custom-styles")
    <title>@yield("title")</title>
</head>

<body class="bg-gray-100">
    @include("admin.layouts.navbar")
    <div class="flex flex-row flex-wrap h-screen">
        @include('admin.layouts.sidebar')
        <div class="bg-gray-100 flex-1 p-6 md:mt-16 w-1/2 md:w-full">
            @yield("content")
        </div>
    </div>

    <x-success-notification />
    <!-- script -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- end script -->
    @stack("custom-scripts")
</body>

</html>