<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-4 h-10 text-sm font-medium text-slate-400 dark:text-slate-600  cursor-not-allowed bg-white/50 dark:bg-slate-800/50 leading-5 rounded-md">
                        <x-paginate.previous></x-paginate.previous>
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 h-10 text-sm font-medium border dark:border-none bg-white dark:bg-slate-800 hover:text-brand-400 dark:hover:text-brand-300 leading-5 rounded-md transition ease-in-out duration-150">
                        <x-paginate.previous></x-paginate.previous>
                    </button>
                @endif
            </span>

            <div>
                <p class="text-sm leading-5">
                    <span>Showing</span>
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    <span>to</span>
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    <span>of</span>
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    <span>results</span>
                </p>
            </div>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 h-10 text-sm font-medium border dark:border-none bg-white dark:bg-slate-800 hover:text-brand-400 dark:hover:text-brand-300 leading-5 rounded-md transition ease-in-out duration-150">
                        <x-paginate.next></x-paginate.next>
                    </button>
                @else
                    <span class="relative inline-flex items-center px-4 h-10 text-sm font-medium text-slate-400 dark:text-slate-600  cursor-not-allowed bg-white/50 dark:bg-slate-800/50 leading-5 rounded-md">
                        <x-paginate.next></x-paginate.next>
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>

