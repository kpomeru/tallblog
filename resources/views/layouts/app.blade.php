@extends('layouts.base')

@section('body')
    <livewire:components.ui.header />

    @if (auth()->user()->registration_progress < 4)
        <x-register.progress-checker />
    @endif

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
