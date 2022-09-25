@section('title', 'Reset your password')

<div class="space-y-8">
    <div class="text-center md:text-right">
        <h3 class="text-gray-900 dark:text-white leading-9">
            Reset your Password
        </h3>
    </div>

    <div class="mx-auto w-full sm:max-w-sm md:max-w-md space-y-4">
        <x-card class="md:translate-x-32 overflow-hidden">
            @if ($emailSentMessage)
            <div class="rounded-md bg-emerald-500 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-white">
                            {{ $emailSentMessage }}
                        </p>
                    </div>
                </div>
            </div>
            @else
            <form wire:submit.prevent="sendResetPasswordLink" class="space-y-6">
                <div class="space-y-2">
                    <x-form.label for="email">
                        Email Address
                    </x-form.label>

                    <x-form.text-input wire:model.lazy="email" id="email" :error="$errors->has('email')" type="email" required autofocus placeholder="johndoe@example.com" />

                    @error('email')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>

                <div>
                    <x-button wire:loading.attr="disabled" class="w-full group" type="submit">
                        <x-spinner wire:loading.delay wire:target="sendResetPasswordLink" />
                        <span wire:loading.remove>Send password reset link</span>
                        <i wire:loading.remove class="fas fa-arrow-right group-hover:translate-x-1"></i>
                    </x-button>
                </div>
            </form>
            @endif
        </x-card>
    </div>
</div>
