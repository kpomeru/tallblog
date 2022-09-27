@props(['id' => null, 'maxWidth' => null])

<x-modal.modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="bg-white p-6 md:p-8">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-rose-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-rose-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>

            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                @if (isset($title))
                    <div class="text-lg">
                        <h1 class="font-medium text-brand space-x-2">{{ $title }}</h1>
                    </div>
                @endif

                <div class="mt-4 space-y-6">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 flex items-center justify-end space-x-4">
        {{ $footer }}
    </div>
</x-modal.modal>
