<span
    class="px-6 py-2 rounded-full cursor-pointer text-sm font-medium hover:ring hover:ring-offset-2 hover:outline-none ring-brand-200 dark:ring-brand-200/25 ring-offset-white dark:ring-offset-slate-800 capitalize"
    :class="selected.includes(categoryItem.id) ? 'bg-brand dark:bg-brand-400 text-white' : 'bg-slate-100 dark:bg-slate-700/75'" @click="addOrRemove(categoryItem.id)"
>
    <span x-text="categoryItem.title"></span>
</span>
