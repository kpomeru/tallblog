@section('title', 'Reset password')

<div class="space-y-8">
    <div class="text-center md:text-right">
        <h3 class="text-gray-900 dark:text-white leading-9">
            Reset Password
        </h3>
    </div>

    <div class="mx-auto w-full sm:max-w-sm md:max-w-md space-y-4">
        <x-card class="md:translate-x-32">
            <form wire:submit.prevent="resetPassword" class="space-y-6">
                <input wire:model="token" type="hidden">

                <div class="space-y-1">
                    <x-form.label for="email">
                        Email Address
                    </x-form.label>

                    <x-form.text-input wire:model.lazy="email" id="email" :error="$errors->has('email')" type="email" required autofocus placeholder="johndoe@example.com" />

                    @error('email')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>

                <div class="space-y-1">
                    <x-form.label for="password">
                        Password
                    </x-form.label>

                    <x-form.text-input wire:model.lazy="password" id="password" :error="$errors->has('password')" type="password" required autofocus placeholder="********" />

                    @error('password')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>

                <div class="space-y-1">
                    <x-form.label for="password_confirmation">
                        Confirm Password
                    </x-form.label>

                    <x-form.text-input wire:model.lazy="passwordConfirmation" id="password_confirmation" :error="$errors->has('password')" type="password" required autofocus placeholder="********" />

                    @error('password')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>

                <div>
                    <x-button wire:loading.attr="disabled" class="w-full group" type="submit">
                        <x-spinner wire:loading.delay wire:target="resetPassword" />
                        <span wire:loading.remove>Reset password</span>
                        <i wire:loading.remove class="fas fa-arrow-right group-hover:translate-x-1"></i>
                    </x-button>
                </div>
            </form>
        </x-card>
    </div>
</div>
