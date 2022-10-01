@section('title', $title)

<div
    x-data="{
        page: @entangle('page'),
        search: @entangle('search'),
        showSearch: @entangle('showSearch'),
    }"
    x-init="$watch('page', () => {
        window.scrollTo({top: 0})
    })"
    class="py-6"
>
    <template x-if="showSearch">
        <div class="fixed bg-slate-800/40 dark:bg-slate-900/75 inset-0 z-[41]"></div>
    </template>
    <div class="custom__container space-y-6 md:space-y-8 lg:space-y-10 relative">
        <div class="flex items-center justify-between space-x-2">
            <div class="flex items-center justify-between relative w-full space-x-2">
                <x-posts.search />
                <livewire:components.posts.categories-list :category-slug="isset($category) ? $category->slug : 'all'" />
                <x-button class="!border-none shrink-0" color="transparent" title="Search posts"  @click="showSearch = true">
                    <x-heroicon-s-magnifying-glass />
                    <span>Search</span>
                </x-button>
            </div>

            @if (auth()->check() && auth()->user()->can_post)
                <x-button.icon class="shrink-0" color="transparent" title="Add a new post">
                    <x-heroicon-s-plus />
                </x-button.icon>
            @endif
        </div>

        <div x-show="search" class="text-slate-500">
            <span>Show posts for</span>
            <span x-text="`'${search}'`" class="text-brand-300 font-medium"></span>
        </div>

        <div class="@if ($list->count()) md:columns-2 @endif md:gap-x-8 lg:gap-x-10 space-y-6 md:space-y-8 lg:space-y-10">
            @forelse ($list as $key => $post)
                <x-posts.page-card :key="$key . '-' . $post->id" :post="$post" />
            @empty
                <x-posts.not-found title="post" />
            @endforelse
        </div>

        {{ $list->links('components.paginate.index') }}
        {{-- {{ $list->links() }} --}}
    </div>
</div>
