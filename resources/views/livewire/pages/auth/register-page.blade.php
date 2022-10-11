@section('title', 'Get Tallking')

<div class="space-y-8">
    <div class="text-center md:text-right">
        <h3 class="text-gray-900 dark:text-white leading-9">
            Let's get you <span class="text-brand-400 font-bold">TALL</span>king
        </h3>

        <h6>
            Welcome, create an account to get started
        </h6>
    </div>

    <div class="mx-auto w-full sm:max-w-sm md:max-w-md space-y-4">
        <x-register.steps />
        <x-card class="md:translate-x-32">
            <form wire:submit.prevent="register" class="space-y-6">
                <div class="space-y-1">
                    <x-form.label for="email">
                        Email
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
                    <x-form.label for="password-confirmations">
                        Confirm Password
                    </x-form.label>

                    <x-form.text-input wire:model.lazy="passwordConfirmation" id="password-confirmations" :error="$errors->has('password')" type="password" required autofocus placeholder="********" />

                    @error('password')
                        <x-form.error :error="$message"></x-form.error>
                    @enderror
                </div>

                <div>
                    <x-button wire:loading.attr="disabled" class="w-full group" type="submit">
                        <x-spinner wire:loading.delay wire:target="register" />
                        <span wire:loading.remove>Register</span>
                        <x-heroicon-s-arrow-right wire:loading.remove class="group-hover:translate-x-1 w-4" />
                    </x-button>
                </div>
            </form>
        </x-card>
    </div>

    <div class="text-center md:text-right">
        <span>Already Tallking? </span>
        <a class="font-medium hover:text-brand-300" href="{{ route('login') }}" title="Login to your account to contribute">Login</a>
    </div>
</div>
