<div
    class="w-64 h-32 shrink-0 rounded-md bg-slate-800 dark:bg-slate-700 flex items-center justify-between overflow-hidden relative mr-4 cursor-pointer"
    :class="selected.includes(authorItem.id) ? 'bg-indigo-700 text-white shadow-lg' : 'text-slate-400'"
    @click="addOrRemove(authorItem.id)"
>
    <div class="p-4 space-y-4 w-2/3 grow-0 shrink-0">
        <h5 x-text="authorItem.username" class="text-white text-sm"></h5>
        <div class="text-xs max-h-12 overflow-hidden">
            <span x-text="authorItem.bio"></span>
        </div>
    </div>
    <img :src="authorItem.avatar || `https://i.pravatar.cc/160?${authorItem.email}`" class="w-36 rounded-full border-[8px] translate-y-4" :class="selected.includes(authorItem.id) ? 'border-indigo-600' : 'border-white/10'" alt="Author image">
</div>
