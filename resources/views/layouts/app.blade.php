@extends('layouts.base')

@section('body')
    <livewire:components.ui.header />

    @auth
        @if (auth()->user()->registration_progress < 4)
            <x-register.progress-checker />
        @endif
    @endauth

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset

    <x-footer></x-footer>
@endsection
