<div
    x-data="{
        authors: @entangle('authors'),
        selected: @entangle('selected'),

        addOrRemove(id) {
            const author = this.selected.find((item) => item === id);
            author ? this.selected.splice(this.selected.indexOf(author), 1)
                : this.selected.push(id);
        }
    }"
    class="px-4 md:px-6 py-4 xl:p-8 space-y-4"
>
    <h6>Feel like subscribing to an author(s)</h6>

    <div class="flex overflow-x-auto">
        <template x-for="(authorItem, authorIndex) in authors" :key="`author-${authorItem.id}-${authorIndex}`">
            <x-user.small-author-card />
        </template>
    </div>
</div>
