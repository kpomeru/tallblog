<div x-data="{
        open: @entangle('open')
    }"
    @keyup.esc="open = false"
    class="sticky bottom-0 p-6 z-50"
>
    <div class=" flex items-center justify-center">
        <div
            class="flex items-center justify-center rounded-full p-2.5 pr-4 bg-white dark:bg-slate-800 shadow-2xl dark:shadow-none shadow-indigo-200 space-x-2">
            <div class="relative">
                <span
                    class="absolute -top-0.5 -right-0.5 rounded h-3.5 p-0.5 px-1 text-[8px] flex items-center justify-center font-semibold shrink-0 bg-slate-800 dark:bg-white text-white dark:text-slate-700 pointer-events-none tracking-tighter">
                    {{ $post->comments->count() }}
                </span>
                <x-button.icon class="!rounded-full" color="transparent" title="Comments" @click="open = true">
                    <x-heroicon-s-chat-bubble-oval-left></x-heroicon-s-chat-bubble-oval-left>
                </x-button.icon>
            </div>

            @auth
                <span wire:loading.class="disabled pointer-events-none" class="flex items-center space-x-2">
                    @if (!isset($like))
                        <x-posts.like wire:click="like_unlike(true)"  label="post" />
                        <x-posts.dislike wire:click="like_unlike(false)" label="post" />
                    @elseif (isset($like) && $like->vote)
                        <span class="text-[10px] text-slate-500">Thumbs up, change &raquo;</span>
                        <x-posts.dislike wire:click="like_unlike(false)" label="post" />
                    @else
                        <span class="text-[10px] text-slate-500">Thumbs down, change &raquo;</span>
                        <x-posts.like wire:click="like_unlike(true)" label="post" />
                    @endif
                </span>
            @endauth

            <x-posts.likes :count="$post->likes_count"></x-posts.likes>
        </div>
    </div>

    <div
        x-show="open"
        x-trap.noscroll="open"
        class="fixed bottom-0 top-0 right-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 max-h-screen min-h-screen overflow-y-scroll bg-white dark:bg-slate-800 p-4 md:px-6 border-l dark:border-slate-700 divide-y dark:divide-slate-600 shadow-2xl dark:shadow-none shadow-indigo-200"
        @click.outside="open = false"
        @keyup.esc="open = false"
    >
        <div class="flex items-center justify-between pb-4">
            <h6>Comments ({{ $post->comments->count() }})</h6>
            <x-button.icon class="border-none" color="transparent" @click="open = false">
                <x-heroicon-o-x-mark />
            </x-button.icon>
        </div>
        <div class="divide-y dark:divide-slate-600">
            @foreach ($post->comments as $commentKey => $comment)
                <livewire:components.posts.comment :key="$comment->id.'-'.$commentKey" :id="$comment->id">
                </livewire:components.posts.comment>
            @endforeach
        </div>
    </div>
</div>
