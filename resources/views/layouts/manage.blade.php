@extends('layouts.app')

@section('content')
    <div class="custom__container py-4 md:py-6 space-y-6 lg:space-y-8">
        <x-manage-menu></x-manage-menu>

        <div>
            @yield('manage_content')
        </div>
    </div>
@endsection

