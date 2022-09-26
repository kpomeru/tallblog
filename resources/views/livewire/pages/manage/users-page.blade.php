<div class="space-y-6 lg:space-y-8">
    <div class="flex items-center justify-between">
    <div class="flex items-center space-x-2">
        <x-heroicon-s-user-group />
        <h4>Users</h4>
    </div>
    <div class="flex items-center justify-end space-x-2">
        <x-form.select wire:model="perPage" id="perPage" class="w-24">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </x-form.select>
        <x-form.text-input type="text" wire:model="filters.search" placeholder="Search users..." />
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
                    <x-table.heading sortable multi-column wire:click="sortBy('username')"
                        :direction="$sorts['username'] ?? null">Username</x-table.heading>

                    <x-table.heading sortable multi-column wire:click="sortBy('email')"
                        :direction="$sorts['email'] ?? null">Email</x-table.heading>

                    <x-table.heading sortable multi-column wire:click="sortBy('deleted_at')"
                        :direction="$sorts['deleted_at'] ?? null">Status</x-table.heading>

                    <x-table.heading sortable multi-column wire:click="sortBy('created_at')"
                        :direction="$sorts['created_at'] ?? null">Joined</x-table.heading>

                    <x-table.heading sortable multi-column wire:click="sortBy('updated_at')"
                        :direction="$sorts['updated_at'] ?? null">Modified</x-table.heading>

                    <x-table.heading />
                </x-slot>

                <x-slot name="body">
                    @forelse ($list as $index => $user_item)
                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $user_item->id }}"
                        class="{{ ($index + 1) % 2 === 0 ? 'bg-slate-50 dark:bg-slate-800/25' : '' }}">
                        <x-table.cell class="space-x-1 flex items-center">
                            <x-user-badge :user="$user_item"></x-user-badge>

                            @if(in_array($user_item->role, ['super_admin', 'admin']))
                            <x-heroicon-s-star class="w-3 {{ $user_item->role === 'super_admin' ? 'text-indigo-500' : 'text-slate-500' }}" />
                            @endif
                        </x-table.cell>

                        <x-table.cell>
                            <span class="">{{ $user_item->email }} </span>
                        </x-table.cell>

                        <x-table.cell class="text-center">
                            <span>
                                @if (!$user_item->deleted_at)
                                <x-badge class="success">Active</x-badge>
                                @else
                                <x-badge class="error">Inactive</x-badge>
                                @endif
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            {{ $user_item->created_at->diffForHumans() }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $user_item->updated_at->diffForHumans() }}
                        </x-table.cell>

                        <x-table.cell class="flex justify-end items-center space-x-2">
                            <x-button.icon color="transparent" class="shrink-0" title="Edit member">
                                <x-heroicon-m-pencil class="w-4 text-blue-300" />
                            </x-button.icon>
                            @isset($user_item->deleted_at)
                            <x-button.icon color="transparent" class="shrink-0" title="Unlock member">
                                <x-heroicon-m-eye class="w-4 text-emerald-300" />
                            </x-button.icon>
                            @else
                            <x-button.icon color="transparent" class="shrink-0" title="Block member">
                                <x-heroicon-m-eye-slash class="w-4 text-rose-300" />
                            </x-button.icon>
                            @endisset
                        </x-table.cell>
                    </x-table.row>
                    @empty
                    <x-table.row>
                        <x-table.cell colspan="6" class="text-center py-6">
                            <span class="text-slate-500 dark:text-slate-300">No user found</span>
                        </x-table.cell>
                    </x-table.row>
                    @endforelse
                </x-slot>
            </x-table.table>

            <div>
                {{ $list->links() }}
            </div>
        </div>
    </div>
</div>

</div>
