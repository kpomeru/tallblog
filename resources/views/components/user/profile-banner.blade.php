<div class="flex items-center justify-between space-x-2">
    <h4>Welcome <span class="text-brand-400">{{ auth()->user()->username }}</span></h4>
    <x-badge class="flip">
        {{ auth()->user()->role }}
    </x-badge>
</div>
