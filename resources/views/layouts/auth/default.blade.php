<!DOCTYPE html>
<html lang="en">

<head>
    <base href="">
    <title></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{ asset('theme/dist/assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    @include('config.layout.style')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head> 

<body>
    <main>
        @yield('content')
    </main>
    @include('config.layout.script')
    @livewireScripts
    @stack('script')
</body>

</html>