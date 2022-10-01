<div
    class="max-w-max"
>
    <x-button wire:click="subscribe_or_unsubscribe" wire:loading.attr="disabled" class="w-32 !border-none group" color="transparent">
        <span class="flex items-center">
            <x-spinner wire:loading />
            <span wire:loading.remove class="flex items-center space-x-2">
                @if ($subscribed)
                    <x-heroicon-s-check class="w-4 group-hover:hidden" />
                    <span class="group-hover:hidden">Subscribed</span>
                    <x-heroicon-s-x-mark class="w-4 hidden group-hover:inline-block" />
                    <span class="hidden group-hover:inline-block">Unsubscribe</span>
                @else
                    <x-heroicon-s-book-open  class="w-4" />
                    <span>Subscribe</span>
                @endif
            </span>
        </span>
    </x-button>
</div>
