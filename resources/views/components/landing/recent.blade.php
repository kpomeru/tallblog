@props(['color',  'post', 'recentPostsKey'])

<div class="text-white group h-48 sm:h-64 md:h-72 lg:h-96 {{ $color }} relative overflow-hidden">
    @isset($post->image)
        <img src="{{ $post->image }}" class="h-full w-full object-cover" alt="">
    @endisset
    <a
        class="absolute  inset-x-0  p-4 md:p-6 lg:py-8 xl:py-10  flex items-center {{ isset($post->image) ? 'bottom-0 bg-slate-800/75 backdrop-blur-sm md:opacity-0 md:translate-y-[25%] md:group-hover:translate-y-0 md:group-hover:opacity-100' : 'inset-y-0' }}"
        href="{{ route('post', ['post' => $post]) }}"
        title="View post"
    >
        <div class="flex flex-col space-y-1">
            <span class="text-base sm:text-xl lg:text-2xl xl:text-4xl font-semibold leading-none sm:leading-none">
                {{ $post->title }}
            </span>
            <span class="flex items-center space-x-2">
                <x-badge class="capitalize">
                    {{ $post->category->title }}
                </x-badge>
                <x-heroicon-s-arrow-right class="md:opacity-0 md:group-hover:opacity-100 md:-translate-x-3 md:group-hover:translate-x-0" />
            </span>
        </div>
    </a>
</div>
