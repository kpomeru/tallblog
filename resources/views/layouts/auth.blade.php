@extends('layouts.base')

@section('body')
    <div class="min-h-screen auth__layout bg-cover bg-center md:grid grid-cols-2 xl:grid-cols-3 pt-32 md:pt-0">
        <div class="flex flex-col justify-center p-6 md:px-8 bg-white/75 backdrop-blur">
            @yield('content')
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
@endsection
