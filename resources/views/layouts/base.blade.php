<!DOCTYPE html>
<html x-data="themeData" class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        {{-- <script src="https://kit.fontawesome.com/e124e9c874.js" crossorigin="anonymous"></script> --}}
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body
        class="font-sans antialiased bg-slate-100 text-slate-800 dark:bg-slate-900 dark:text-slate-100
            selection:bg-brand-200
        "
    >
        {{-- <span class="hidden dark:inline absolute w-[40%] h-96 bg-indigo-900/50 rounded-full -left-32 -top-32 blur-3xl"></span> --}}
        <div class="relative main__area">
            <livewire:components.ui.notifications />
            <x-loading-mask />
            @yield('body')
        </div>
    </body>
</html>
