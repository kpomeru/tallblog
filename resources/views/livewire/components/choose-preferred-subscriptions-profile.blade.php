<div
    x-data="{
        selected: @entangle('selected'),

        addOrRemove(id) {
            const author = this.selected.find((item) => item === id);
            author ? this.selected.splice(this.selected.indexOf(author), 1)
                : this.selected.push(id);
        }
    }"
    class="px-4 md:px-6 py-4 xl:p-8 space-y-4"
>
    <div class="flex flex-col md:flex-row items-center md:justify-between space-y-4 md:space-y-0 md:space-x-6">
        <div class="flex items-center space-x-2 w-full">
            <h6>Update/Choose your Preferred Authors</h6>
            <x-badge class="flip">
                {{ count($selected) }}
            </x-badge>
        </div>
        <x-form.text-input wire:model="search" class="w-full" placeholder="Search" />
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4 lg:gap-6">
        @forelse ($authors as $author)
            <x-user.small-author-card-profile :author="$author" />
        @empty
            <div class="text-center text-slate-500 text-sm sm:col-span-2 md:col-span-3 py-6">
                @if (isset($search))
                    <span>
                        No authors found for <span class="text-brand-400">{{ $search }}</span>
                    </span>
                @else
                    <span>
                        There are no authors right now.
                    </span>
                @endif
            </div>
        @endforelse
    </div>

    {{ $authors->links('components.paginate.index') }}
</div>
