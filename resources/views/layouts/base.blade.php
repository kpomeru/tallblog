<!DOCTYPE html>
<html x-data="themeData" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
        @else
        <title>{{ config('app.name') }}</title>
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400|poppins:500,600,700" rel="stylesheet" />

        <link rel="icon" href="{{ asset('/images/favicon.png') }}" />

        <script src="https://kit.fontawesome.com/e124e9c874.js" crossorigin="anonymous"></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body
        class="
            min-h-screen font-sans antialiased bg-slate-100 text-slate-800 dark:bg-slate-900 dark:text-slate-100
            selection:bg-brand-200
        "
    >
        @yield('body')
    </body>

</html>
