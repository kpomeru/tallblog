<div
    x-data="{
        categories: @js($headerCategories),
        categorySlug: @entangle('categorySlug')
    }"
    x-init="() => {
        if (!categorySlug) {
            categorySlug = 'all'
        }
    }"
    class="w-full"
>
    <div class="hidden lg:flex items-center border-b dark:border-slate-700 space-x-4">
        <template x-for="(categoryItem, categoryIndex) in [{title: 'all', slug: 'all'}, ...categories.map(i => { return {title: i.title, slug: i.slug} })]" :key="`category-${categoryItem.id}-${categoryIndex}`">
            <x-categories.list-select />
        </template>
    </div>
</div>
