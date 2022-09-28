<div>
    @if (isset($category))
    <form wire:submit.prevent="update">
        <x-modal.dialog wire:model="showModal" max-width="md" modal-placement="items-center">
            <x-slot name="title">
                <x-heroicon-s-square-2-stack />
                <h5 class="flex items-center space-x-1">
                    <span>Update Category</span>
                    <x-badge>{{ $category->title }}</x-badge>
                </h5>
            </x-slot>

            <x-slot name="content">
                <div x-data="{
                            showModal: @entangle('showModal'),
                        }" class="space-y-6 lg:space-y-8 relative">
                    <div class="flex items-center space-x-4">
                        @isset ($category->image)
                        <div class="shrink-0 w-16 h-16 bg-slate-500 dark:bg-slate-700 flex items-center justify-center rounded-md "
                            title="Current category image">
                            <img src="{{ asset($category->image) }}" alt="Current category image">
                        </div>
                        @endif

                        <div class="space-y-1 w-full">
                            <x-form.label for="title">
                                Title
                            </x-form.label>
                            <x-form.text-input disabled id="title" value="{{ $category->title }}" />
                        </div>
                    </div>

                    <div class="space-y-1">

                        <x-form.file-input wire:model="image" id="category-image" :image="$image"
                            label="{{ isset($category->image) ? 'Replace Image' : 'Choose Image' }}">
                            <x-slot:clear>
                                @isset($image)
                                <span wire:click="$set('image', null)"
                                    class="bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 cursor-pointer w-6 h-6 rounded-full flex items-center justify-center">
                                    <x-heroicon-o-x-mark class="w-4" />
                                </span>
                                @endisset
                            </x-slot:clear>
                        </x-form.file-input>

                        @error('image')
                        <x-form.error :error="$message"></x-form.error>
                        @enderror
                    </div>

                    <div class="space-y-1">
                        <x-form.label for="hexcode">
                            <span class="flex items-center space-x-1">
                                <span>Hexcode</span>
                                @isset($category->hexcode)
                                    <span class="rounded-sm w-3 h-3 inline-block border border-slate-700 dark:border-slate-500" style="background-color: #{{ $category->hexcode }}"></span>
                                @endisset
                            </span>
                        </x-form.label>

                        <x-form.text-input wire:model.lazy="category.hexcode" id="hexcode"
                            :error="$errors->has('category.hexcode')" minlength="6" maxlength="6"
                            placeholder="005A5D" />

                        @error('category.hexcode')
                        <x-form.error :error="$message"></x-form.error>
                        @enderror
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex items-center justify-between w-full">
                    <div>
                        @if ($errors->any())
                        <span wire:loading.attr="disabled" wire:click="clearErrorBag"
                            class="cursor-pointer text-sm font-semibold text-gray-500">Clear error messages.</span>
                        @endif
                    </div>

                    <div class="flex justify-end space-x-2">
                        <x-button wire:click="destroy" wire:loading.attr="disabled" wire:target="destroy"
                            color="transparent">
                            <x-heroicon-s-x-mark class="w-4" />
                            <span>Cancel</span>
                        </x-button>

                        <x-button wire:loading.attr="disabled" class="group shrink-0" type="submit"
                            title="Update category">
                            <x-spinner wire:loading.delay wire:target="update" />
                            <span wire:target="update" wire:loading.remove>Save Changes</span>
                            <x-heroicon-s-arrow-right wire:target="update" wire:loading.remove
                                class="group-hover:translate-x-1 w-4" />
                        </x-button>
                    </div>
                </div>
            </x-slot>
        </x-modal.dialog>
    </form>
    @endif
</div>
