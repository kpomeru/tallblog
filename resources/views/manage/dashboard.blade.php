@extends('layouts.manage')
@section('title', 'Admin Dashboard')

@section('manage_content')
    <div class="space-y-6 md:space-y-8 py-8">
        <x-user.profile-banner />

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
            <x-dashboard-card :count="$users_count" item="users" route-name="manage.users" />
            <x-dashboard-card :count="$categories_count" item="categories" route-name="manage.categories" />
            <x-dashboard-card :count="$posts_count" item="posts" route-name="posts" />
            <x-dashboard-card :count="$comments_count" item="comments" />
            <x-dashboard-card :count="$likes_count" item="likes" />
        </div>
    </div>
@endsection
