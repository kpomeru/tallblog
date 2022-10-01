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
    class="w-full !ml-0"
>
    <x-form.select x-model="categorySlug" class="lg:hidden capitalize w-32" id="role">
        <template x-for="(categoryItem, categoryIndex) in [{title: 'all', slug: 'all'}, ...categories.map(i => { return {title: i.title, slug: i.slug} })]" :key="`select-category-${categoryItem.id}-${categoryIndex}`">
            <option :value="categoryItem.slug" x-text="categoryItem.title"></option>
        </template>
    </x-form.select>

    <div class="hidden lg:flex items-center border-b dark:border-slate-700 space-x-4">
        <template x-for="(categoryItem, categoryIndex) in [{title: 'all', slug: 'all'}, ...categories.map(i => { return {title: i.title, slug: i.slug} })]" :key="`category-${categoryItem.id}-${categoryIndex}`">
            <x-categories.list-select />
        </template>
    </div>
</div>
