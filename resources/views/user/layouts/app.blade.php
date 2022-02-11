<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/site.webmanifest')}}">
    @livewireStyles
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    @stack("custom-styles")
    <title>@yield("title")</title>
</head>

<body class="font-sans bg-gray-100">
    @include("user.layouts.header")
    @yield("content")
    <!-- script -->
    <footer class="bg-gray-50 py-10 mt-5">
        <div class="flex justify-center items-center space-x-4 sm:flex-col sm:space-y-4">
            <a href="{{route('user.pages.terms')}}" class="hover:underline text-base text-sky-500">Terms &
                Conditions</a>
            <a href="{{route('user.pages.contact')}}" class="hover:underline text-base text-sky-500">Contact Us</a>
            <a href="{{route('user.pages.disclaimers')}}" class="hover:underline text-base text-sky-500">Disclaimers</a>
        </div>
    </footer>
    @livewireScripts
    <script src="{{asset('js/app.js')}}"></script>
    <!-- end script -->
    @stack("custom-scripts")

</body>

</html>