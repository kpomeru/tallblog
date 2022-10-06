<div
    x-data="{
        confirmDelete: @entangle('confirm_delete')
    }"
>
    <span x-show.transition="confirmDelete" class="text-xs space-x-2">
        <span>Are you sure you want to delete post? </span>
        <span wire:click="destroy" class="cursor-pointer underline font-medium">Yes</span>
        <span class="cursor-pointer underline" @click="confirmDelete = false">No</span>
    </span>

    <x-button.icon x-show.transition="!confirmDelete" class="shrink-0" title="Delete Post" @click="confirmDelete = !confirmDelete">
        <x-heroicon-m-trash class="w-4" />
    </x-button.icon>
</div>
