<div>
    @if (isset($user))
        <form wire:submit.prevent="update">
            <x-modal.dialog wire:model="showModal" modal-placement="items-center">
                <x-slot name="title">
                    <x-heroicon-s-user-circle />
                    <h5 class="flex items-center space-x-1">
                        <span>Update User</span>
                        <x-badge>{{ $user->username }}</x-badge>
                    </h5>
                </x-slot>

                <x-slot name="content">
                    <div
                        x-data="{
                            showModal: @entangle('showModal'),
                        }"
                        class="space-y-6 relative"
                    >
                        <div class="space-y-1">
                            <x-form.label for="username">
                                Username
                            </x-form.label>

                            <x-form.text-input disabled id="username" value="{{ $user->username }}" />
                        </div>

                        <div class="space-y-1">
                            <x-form.label for="email">
                                Email *
                            </x-form.label>

                            <x-form.text-input wire:model.lazy="user.email" id="email" :error="$errors->has('user.email')" type="email" required autofocus placeholder="johndoe@example.com" />

                            @error('user.email')
                                <x-form.error :error="$message"></x-form.error>
                            @enderror
                        </div>

                        <div class="space-y-1 w-full">
                            <x-form.label for="role">
                                Role *
                            </x-form.label>

                            <x-form.select wire:model="user.role" class="capitalize w-full" id="role">
                                <option value="admin">admin</option>
                                <option value="contributor">contributor</option>
                                <option value="subscriber">subscriber</option>
                                <option value="super_admin">super admin</option>
                            </x-form.select>

                            @error('user.role')
                                <x-form.error :error="$message"></x-form.error>
                            @enderror
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="space-x-2 w-full flex items-center">
                                <x-form.checkbox wire:model.lazy="verify_email" id="verify-email"></x-form.checkbox>

                                <x-form.label class="block text-slate-500 dark:text-slate-400 cursor-pointer" for="verify-email">
                                    Verify email?
                                </x-form.label>

                                @error('verify_email')
                                    <x-form.error :error="$message"></x-form.error>
                                @enderror
                            </div>

                            <div class="space-x-2 w-full flex items-center">
                                <x-form.checkbox wire:model.lazy="delete_user" id="delete-user"></x-form.checkbox>

                                <x-form.label class="block text-slate-500 dark:text-slate-400 cursor-pointer" for="delete-user">
                                    Delete user account?
                                </x-form.label>

                                @error('delete_user')
                                    <x-form.error :error="$message"></x-form.error>
                                @enderror
                            </div>
                        </div>

                    </div>
                </x-slot>

                <x-slot name="footer">
                    <div class="flex items-center justify-between w-full">
                        <div>
                            @if ($errors->any())
                                <span wire:loading.attr="disabled" wire:click="clearErrorBag" class="cursor-pointer text-sm font-semibold text-gray-500">Clear error messages.</span>
                            @endif
                        </div>

                        <div class="flex justify-end space-x-2">
                            <x-button
                                wire:click="destroy"
                                wire:loading.attr="disabled"
                                wire:target="destroy"
                                color="transparent"
                            >
                                <x-heroicon-s-x-mark class="w-4" />
                                <span>Cancel</span>
                            </x-button>

                            <x-button wire:loading.attr="disabled" class="w-full group" type="submit" title="Update user">
                                <x-spinner wire:loading.delay wire:target="update" />
                                <span wire:target="update" wire:loading.remove>Save Changes</span>
                                <x-heroicon-s-arrow-right wire:target="update" wire:loading.remove class="group-hover:translate-x-1 w-4" />
                            </x-button>
                        </div>
                    </div>
                </x-slot>
            </x-modal.dialog>
        </form>
    @endif
</div>
