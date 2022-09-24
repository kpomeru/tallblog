@extends('layouts.base')

@section('body')
    <div class="absolute top-6 right-6 flex space-x-4 z-10">
        <x-theme-switch :has-override="false" />
        <a class="" href="{{ route('home') }}">
            <x-logo color="white" />
        </a>
    </div>

    <div class="min-h-screen auth__layout bg-cover bg-center dark:bg-opacity-50 md:grid grid-cols-2 xl:grid-cols-3 pt-24 md:pt-0">
        <div class="flex flex-col justify-center p-6 md:px-8 bg-white/75 dark:bg-slate-900/50 backdrop-blur rounded-t-3xl md:rounded-t-none md:border-r border-white dark:border-black/25">
            @yield('content')
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
@endsection
