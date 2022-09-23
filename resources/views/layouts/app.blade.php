@extends('layouts.base')

@section('body')
    <livewire:components.ui.header />
    
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
