<x-dropdown>
    <x-slot:trigger>
        <div class="rounded-full p-1 pr-3 flex items-center space-x-2 bg-brand-100 hover:bg-white dark:bg-slate-800 dark:hover:bg-slate-700 h-10">
            <x-avatar class="w-8 rounded-full"></x-avatar>
            <span class="font-medium text-sm">
                {{ auth()->user()->username }}
            </span>
        </div>
    </x-slot:trigger>

    <x-slot:content>
        @if (in_array(auth()->user()->role, ['super_admin', 'admin']))
        <a class="text-sm block px-3 md:px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700" href="{{ route('manage.dashboard') }}" title="Admin dashboard">Manage</a>
        @endif


        <a class="text-sm block px-3 md:px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Come back soon">Log out</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </x-slot:content>
</x-dropdown>
