@section('title', $page_title)

@php
    // dd($model->image);
@endphp


<div class="custom__container">
    <div class="py-6 md:py-8 xl:py-10 w-full xl:max-w-screen-md space-y-6">
        <div class="flex items-center justify-between">
            <h4>{{ $page_title }}</h4>
            <x-button.back color="light" />
        </div>

        @if ($model->user_id !== auth()->id())
            <div class="text-center py-3 px-4 rounded bg-indigo-500 border border-indigo-600 dark:border-transparent text-white">
                <span class="text-sm">You are only allowed to edit/update specific post information.</span>
            </div>
        @endif

        <x-card>
            <form class="space-y-6 relative">
                <div class="space-y-1">
                    <x-form.label for="title">
                        Title *
                    </x-form.label>

                    <x-form.text-input wire:model.lazy="model.title" autofocus :disabled="$model->user_id !== auth()->id()" :error="$errors->has('model.title')" id="title" placeholder="Post title" required />

                    @error('model.title')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>

                <div class="space-y-1 w-full">
                    <x-form.label for="role">
                        Category *
                    </x-form.label>

                    <x-form.select wire:model="model.category_id" class="capitalize w-full" :disabled="$model->user_id !== auth()->id()" :error="$errors->has('model.title')" id="role">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </x-form.select>

                    @error('model.category_id')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>

                <div class="space-y-1">
                    <x-form.label for="excerpt">
                        Excerpt *
                    </x-form.label>

                    <x-form.textarea wire:model.lazy="model.excerpt" :count="str()->length($model->excerpt)" :disabled="$model->user_id !== auth()->id()" :error="$errors->has('model.excerpt')" id="excerpt" maxlength="200" placeholder="Enter brief post summary"></x-form.textarea>

                    @error('model.excerpt')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>


                <div class="space-y-1">
                    <x-form.label for="content">
                        Content *
                    </x-form.label>

                    @if ($model->user_id !== auth()->id())
                    <div class="content__styles rounded-md p-4 border bg-slate-200 dark:bg-slate-800 dark:border-slate-700">
                        {!! $model->content !!}
                    </div>
                    @else
                        <livewire:components.trix :value="$model->content" :disabled="$model->user_id !== auth()->id()" />
                    @endif

                    @error('model.content')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>

                <div class="space-y-1">
                    <x-form.label for="tags">
                        Tags
                    </x-form.label>

                    <x-form.text-input wire:model.lazy="tags" :disabled="$model->user_id !== auth()->id()" :error="$errors->has('tags')" id="tags" placeholder="tags" />

                    @error('tags')
                        <x-form.error :error="$message"></x-form.error>
                    @else
                        <span class="text-xs text-slate-500">Enter tags separated by a comma</span>
                    @enderror
                </div>

                <div class="space-y-6 xl:space-y-8 xl:fixed right-6 bottom-6 xl:p-6 xl:bg-white dark:xl:bg-slate-800 xl:rounded-md xl:w-80">
                    <div class="space-y-1">
                        <x-form.file-input wire:model="image" :disabled="$model->user_id !== auth()->id()" id="post-image" :image="$image" :previous-image="$mode !== 'create' ? $model->image : null"
                            label="{{ isset($model->image) ? 'Replace Image' : 'Choose Image' }}">
                            <x-slot:clear>
                                @isset($image)
                                <span wire:click="$set('image', null)"
                                    class="bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 cursor-pointer w-6 h-6 rounded-full flex items-center justify-center shrink-0">
                                    <x-heroicon-o-x-mark class="w-4" />
                                </span>
                                @endisset
                            </x-slot:clear>
                        </x-form.file-input>

                        @error('image')
                        <x-form.error :error="$message"></x-form.error>
                        @enderror
                    </div>

                    <div class="space-x-2 w-full flex items-center">
                        <x-form.checkbox wire:model.lazy="published" :disabled="$model->user_id !== auth()->id()" id="published"></x-form.checkbox>

                        <x-form.label class="block text-slate-500 dark:text-slate-400" :disabled="$model->user_id !== auth()->id()" for="published">
                            Publish Post?
                        </x-form.label>

                        @error('published')
                            <x-form.error :error="$message"></x-form.error>
                        @enderror
                    </div>

                    @if (auth()->user()->is_admin)
                    <div class="space-x-2 w-full flex items-center">
                        <x-form.checkbox wire:model.lazy="featured" :disabled="!$published" id="featured"></x-form.checkbox>

                        <x-form.label class="block text-slate-500 dark:text-slate-400" :disabled="!$published" for="featured">
                            Featured Post?
                        </x-form.label>

                        @error('featured')
                            <x-form.error :error="$message"></x-form.error>
                        @enderror
                    </div>
                    @endif

                    <div class="flex xl:justify-between pt-6 xl:pt-4">
                        <x-button.back class="xl:hidden mr-2" />

                        <x-button wire:click.prevent="save" wire:loading.attr="disabled" wire:target="save" color="light" class="group mr-2" type="submit"
                            title="Save">
                            <div class="flex items-center">
                                <x-spinner wire:loading.delay wire:target="save" class="mr-2" />
                                <span wire:target="save" wire:loading.remove>
                                    Save
                                </span>
                            </div>
                        </x-button>

                        <x-button wire:click.prevent="save_and_continue" wire:loading.attr="disabled" wire:target="save_and_continue" class="group xl:w-full" type="submit"
                            title="Save and continue">
                            <div class="flex items-center">
                                <x-spinner wire:loading.delay wire:target="save_and_continue" />
                                <span wire:target="save_and_continue" wire:loading.remove>
                                    {{ $mode === 'edit' ? 'Save' : ($published ? 'Save, Publish' : 'Save Draft') }} & Continue
                                </span>
                                <x-heroicon-s-arrow-right wire:target="save_and_continue" wire:loading.remove
                                    class="group-hover:translate-x-1 w-4" />
                            </div>
                        </x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</div>
