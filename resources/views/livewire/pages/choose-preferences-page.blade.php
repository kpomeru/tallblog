@section('title', 'Customise your Tallking Experience')

<div class="space-y-8">
    <div class="text-center md:text-right">
        <h6>
            Customise your
        </h6>
        <h3 class="text-gray-900 dark:text-white leading-9">
            <span class="text-brand-400 font-bold">TALL</span>king Experience
        </h3>
    </div>

    <div class="mx-auto w-full sm:max-w-sm md:max-w-md space-y-4">
        <x-register.steps />
        <x-card class="md:translate-x-32 !p-0 divide-y dark:divide-slate-700 overflow-hidden">
            <livewire:components.choose-preferred-categories />
            <livewire:components.choose-preferred-subscriptions />
        </x-card>
    </div>

    <div class="flex items-center justify-end">
        <a class="font-medium hover:text-brand-300" href="{{ route('home') }}" title="Get started and Tallk all you want">
            <x-button wire:loading.attr="disabled" color="light" class="w-full group">
                <span>{{ auth()->user()->registration_progress <= 3 ? 'Skip' : 'Continue' }}</span>
                <x-heroicon-s-arrow-right class="group-hover:translate-x-1 w-4" />
            </x-button>
        </a>
    </div>
</div>
