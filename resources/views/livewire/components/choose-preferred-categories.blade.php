<div
    x-data="{
        categories: @entangle('categories'),
        selected: @entangle('selected'),

        addOrRemove(id) {
            const category = this.selected.find((item) => item === id);
            category ? this.selected.splice(this.selected.indexOf(category), 1)
                : this.selected.push(id);
        }
    }"
    class="px-4 md:px-6 py-4 xl:p-8 space-y-2"
>
    <h6>Please select your preferred categories</h6>

    <div class="flex flex-wrap space-x-2 space-y-2 -ml-2">
        <template x-for="(categoryItem, categoryIndex) in categories" :key="`category-${categoryItem.id}-${categoryIndex}`">
            <x-categories.select />
        </template>
    </div>
</div>
