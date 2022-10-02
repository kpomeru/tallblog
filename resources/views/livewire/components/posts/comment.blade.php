<div
    x-data="{
        confirmDelete: @entangle('confirm_delete')
    }"
    class="py-6 space-y-3"
>
    <div class="flex justify-between">
        <div class="flex items-center space-x-4">
            <x-avatar class="rounded-full w-10" type="image" :user="$comment->user"></x-avatar>
            <div class="flex flex-col">
                <span class="block font-medium">
                    {{ $comment->user->username }}
                </span>
                <span class="block text-xs text-slate-500">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
            </div>
        </div>

        @if ($can_delete)
            <div>
                <span x-show.transition="!confirmDelete" class="text-xs cursor-pointer" @click="confirmDelete = !confirmDelete">Delete</span>
                <span x-show.transition="confirmDelete" class="text-xs">
                    <span>Are you sure? </span>
                    <span wire:click="destroy" class="cursor-pointer underline font-medium">Yes</span>
                    <span class="cursor-pointer underline" @click="confirmDelete = false">No</span>
                </span>
            </div>
        @endif
    </div>

    <div class="text-xs dark:text-slate-300">
        {{ $comment->comment }}
    </div>

    <div class="flex items-center space-x-2">
        @auth
            <span wire:loading.class="disabled pointer-events-none" class="flex items-center space-x-2">
                @if (!isset($like))
                    <x-posts.like wire:click="like_unlike(true)"  label="comment" />
                    <x-posts.dislike wire:click="like_unlike(false)" label="comment" />
                @elseif (isset($like) && $like->vote)
                    <span class="text-[10px] text-slate-500">Thumbs up, change &raquo;</span>
                    <x-posts.dislike wire:click="like_unlike(false)" label="comment" />
                @else
                    <span class="text-[10px] text-slate-500">Thumbs down, change &raquo;</span>
                    <x-posts.like wire:click="like_unlike(true)" label="comment" />
                @endif
            </span>
        @endauth

        <x-posts.likes :count="$comment->likes_count"></x-posts.likes>
    </div>
</div>
