@section('title', 'Create a new account')

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
{{--

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 leading-5">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 appearance-none rounded-md focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div> --}}

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Register
                        </button>
                    </span>
                </div>
            </form>
        </x-card>
    </div>

    <div class="text-center md:text-right">
        <span>Already Tallking? </span>
        <a class="font-medium hover:text-brand-300" href="{{ route('login') }}" title="Login to your account to contribute">Login</a>
    </div>
</div>
