@php

@endphp


<div class="bg-indigo-500 text-white px-4 md:px-6 py-3 md:py-4 xl:py-5 flex items-center justify-center font-medium space-x-1 text-sm text-center">
    @if (auth()->user()->registration_progress === 2)
        <span>
            Please verify your account with the email you received, or <a class=" hover:text-indigo-300 underline" href="{{ route('verification.notice') }}" title="Verify your email address">click here</a> for more.
        </span>
    @else

    @endif
</div>
