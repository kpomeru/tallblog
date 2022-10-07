<x-dropdown>
    <x-slot:trigger>
        <div class="rounded-full p-1 sm:pr-3 space-x-2 flex items-center bg-slate-800 text-white hover:bg-slate-700 h-10">
            <x-avatar class="w-8 rounded-full" type="image"></x-avatar>
            <span class="hidden sm:inline font-medium text-sm">
                {{ auth()->user()->username }}
            </span>
        </div>
    </x-slot:trigger>

    <x-slot:content>
        <a class="text-sm block px-3 md:px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700 md:hidden" href="{{ route('posts') }}" title="View Posts">Posts</a>

        @if (in_array(auth()->user()->role, ['super_admin', 'admin']))
        <a class="text-sm block px-3 md:px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700" href="{{ route('manage.dashboard') }}" title="Admin dashboard">Manage</a>
        @endif

        @if (auth()->user()->can_post)
            <a class="text-sm block px-3 md:px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700" href="{{ route('posts', ['authorPosts' => true]) }}" title="View Posts">My Posts</a>
        @endif

        <a class="text-sm block px-3 md:px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700" href="{{ route('profile') }}" title="View Posts">Profile</a>

        <a class="text-sm block px-3 md:px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Come back soon">Log out</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </x-slot:content>
</x-dropdown>
