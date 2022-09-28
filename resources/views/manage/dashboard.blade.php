@extends('layouts.manage')
@section('title', 'Admin Dashboard')

@section('manage_content')
    <div>
        <div class="flex items-center justify-between space-x-2">
            <h4>Welcome <span class="text-brand-400">{{ auth()->user()->username }}</span></h4>
            <x-badge class="capitalize flip">
                {{ auth()->user()->role }}
            </x-badge>
        </div>
    </div>
@endsection
