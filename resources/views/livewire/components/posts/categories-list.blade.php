<div
    x-data="{
        categories: @js($headerCategories),
        categorySlug: @entangle('categorySlug'),

        getCategoryList() {
            const i = [
                {title: 'all', slug: 'all'},
                ...this.categories.map(i => { return {title: i.title, slug: i.slug} }),
                {title: 'my posts', slug: 'my-posts'},
            ];
            i.sort((a, b) => a.title > b.title ? 1 : -1);
            return i;
        }
    }"
    x-init="() => {
        if (!categorySlug) {
            const x = @js((bool) request()->get('authorPosts'));
            categorySlug = x ? 'my-posts' : 'all';
        }
    }"
    class="w-full !ml-0"
>
    <x-form.select x-model="categorySlug" class="lg:hidden capitalize w-32" id="role">
        <template x-for="(categoryItem, categoryIndex) in getCategoryList" :key="`select-category-${categoryItem.id}-${categoryIndex}`">
            <option :value="categoryItem.slug" x-text="categoryItem.title"></option>
        </template>
    </x-form.select>

    <div class="hidden lg:flex items-center border-b dark:border-slate-700 space-x-4">
        <template x-for="(categoryItem, categoryIndex) in getCategoryList" :key="`category-${categoryItem.id}-${categoryIndex}`">
            <x-categories.list-select />
        </template>
    </div>
</div>
