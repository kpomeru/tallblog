@section('title', 'Verify your email address')

<div class="space-y-6">
    <div class="text-center md:text-right">
        <h6>
            Please verify your email to
        </h6>
        <h3 class="text-gray-900 dark:text-white leading-9">
            Keep <span class="text-brand-400 font-bold">TALL</span>king
        </h3>
    </div>

    <div class="mx-auto w-full sm:max-w-sm md:max-w-md space-y-4">
        <x-register.steps />
        <x-card class="md:translate-x-32 overflow-hidden">
            <div wire:loading wire:target="resend" class="bg-white/75 dark:bg-slate-800/75 absolute inset-0">
                <div class="flex items-center justify-center w-full h-full">
                    <x-spinner class="hidden dark:inline" />
                    <x-spinner type="black" class="dark:hidden" />
                </div>
            </div>

            @if (session('resent'))
                <div class="flex items-center px-4 py-3 mb-6 text-sm text-white bg-emerald-500 rounded shadow" role="alert">
                    <svg class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>

                    <p>A fresh verification link has been sent to your email address.</p>
                </div>
            @endif

            <div class="text-sm">
                <p>Before proceeding, please check your email for a verification link.</p>

                <p class="mt-3">
                    If you did not receive the email, <a wire:click="resend" class="text-brand-400 dark:text-brand-300 cursor-pointer hover:text-brand-300 dark:hover:text-brand-200 focus:outline-none focus:underline transition ease-in-out duration-150 font-medium">click here to request another</a>.
                </p>
            </div>
        </x-card>
    </div>

    <div class="text-center md:text-right">
        <span>Or</span>
        <a class="font-medium hover:text-brand-300" href="{{ route('logout') }}" title="We are sad to see you leave" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    </div>
</div>
