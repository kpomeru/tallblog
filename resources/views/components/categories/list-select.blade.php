<span
    class="category__menu__item relative px-6 py-4 cursor-pointer text-sm font-medium capitalize text-slate-500 hover:text-brand-400"
    :class="{'text-brand-500 dark:text-brand-300 active': categorySlug === categoryItem.slug}" @click="categorySlug = categoryItem.slug"
>
    <span x-text="categoryItem.title"></span>
</span>
