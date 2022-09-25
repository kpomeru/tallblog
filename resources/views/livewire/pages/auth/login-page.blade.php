@section('title', 'Continue Tallking')

<div class="space-y-8">
    <div class="text-center md:text-right">
        <h6>
            We have missed you
        </h6>
        <h3 class="text-gray-900 dark:text-white leading-9">
            Continue <span class="text-brand-400 font-bold">TALL</span>king
        </h3>
    </div>

    <div class="mx-auto w-full sm:max-w-sm md:max-w-md space-y-4">
        <x-card class="md:translate-x-32">
            <form wire:submit.prevent="authenticate" class="space-y-6">
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

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center space-x-2">
                        <x-form.checkbox wire:model.lazy="remember" id="remember"></x-form.checkbox>

                        <x-form.label class="block text-slate-500 dark:text-slate-400 cursor-pointer" for="remember">
                            Remember
                        </x-form.label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="text-xs font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <x-button wire:loading.attr="disabled" class="w-full group" type="submit">
                        <x-spinner wire:loading.delay wire:target="authenticate" />
                        <span wire:loading.remove>Login</span>
                        <i wire:loading.remove class="fas fa-arrow-right group-hover:translate-x-1"></i>
                    </x-button>
                </div>

                <div>
                    <x-button wire:loading.attr="disabled" class="w-full group" color="light">
                        {{-- <x-spinner wire:loading.delay wire:target="authenticate" /> --}}
                        <img src="{{ asset('images/google.svg') }}" alt="Google logo">
                        <span wire:loading.remove>Continue with Google</span>
                    </x-button>
                </div>
            </form>
        </x-card>
    </div>

    <div class="text-center md:text-right">
        <span>Want to Get Tallking? </span>
        <a class="font-medium hover:text-brand-300" href="{{ route('register') }}" title="Get started and Tallk all you want">Register</a>
    </div>
</div>
