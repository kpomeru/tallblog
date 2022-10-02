<div
    x-data="{
        setFocus() {
            const ta = document.getElementById('post-new-comment')
            if (ta) {
                ta.focus()
            }
        }
    }"
    x-init="
        setFocus();
        $watch('open', (value) => {
            if (value) {
                $nextTick(() => {
                    setFocus();
                });
            }
        })
    "
    class="py-6 space-y-2"
>
    @guest
        <div class="text-center text-sm">
            <span class="text-slate-600 dark:text-slate-400">You need to login to comment, </span>
            <span wire:click="redirect_guest" class="font-medium cursor-pointer">
                Click here
            </span>
        </div>
    @else
        <form wire:submit.prevent="create" class=" space-y-3">
            <x-form.textarea wire:model.lazy="comment" id="post-new-comment" placeholder="Start typing"></x-form.textarea>
            <x-button wire:loading.attr="disabled" class="w-full group" type="submit" title="Update user">
                <x-spinner wire:loading.delay wire:target="create" />
                <span wire:target="create" wire:loading.remove>Add Comment</span>
                <x-heroicon-s-arrow-right wire:target="create" wire:loading.remove class="group-hover:translate-x-1 w-4" />
            </x-button>
        </form>
    @endguest
</div>
