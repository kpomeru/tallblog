<div class="space-y-6 lg:space-y-8">
    <div class="flex items-center justify-between">
    <div class="flex items-center space-x-2">
        <x-heroicon-s-square-2-stack />
        <h4>Categories</h4>
    </div>
    <div class="flex items-center justify-end space-x-2">
        <x-button.icon wire:click="$refresh" class="shrink-0" title="Refresh list">
            <x-heroicon-m-arrow-path></x-heroicon-m-arrow-path>
        </x-button.icon>
    </div>
</div>

<div>
    <div class="space-y-4">
        <div class="flex-col space-y-4">
            <x-table.table>
                <x-slot name="head">
                    <x-table.heading>Title</x-table.heading>
                    <x-table.heading>Slug</x-table.heading>
                    <x-table.heading />
                </x-slot>

                <x-slot name="body">
                    @forelse ($list as $index => $category_item)
                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $category_item->id }}"
                        class="{{ ($index + 1) % 2 === 0 ? 'bg-slate-50 dark:bg-slate-800/25' : '' }}">
                        <x-table.cell class="space-x-3 flex items-center capitalize">
                            <img src="{{ asset('images/categories/'.$category_item->slug.'.gif') }}" class="rounded-md w-8 border dark:border-transparent" alt="">
                            <span>
                                {{ $category_item->title }}
                            </span>
                            <span class="inline-block h-3 w-3 rounded-md bg-slate-500" style="background-color: {{ $category_item->hexcode ? '#'.$category_item->hexcode : '' }}"></span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="">{{ $category_item->slug }} </span>
                        </x-table.cell>

                        <x-table.cell class="flex justify-end items-center space-x-2">
                            <x-button.icon color="transparent" class="shrink-0" title="Edit category">
                                <x-heroicon-m-pencil class="w-4 text-blue-300" />
                            </x-button.icon>
                        </x-table.cell>
                    </x-table.row>
                    @empty
                    <x-table.row>
                        <x-table.cell colspan="3" class="text-center py-6">
                            <span class="text-slate-500 dark:text-slate-300">No category found</span>
                        </x-table.cell>
                    </x-table.row>
                    @endforelse
                </x-slot>
            </x-table.table>
        </div>
    </div>
</div>

</div>
