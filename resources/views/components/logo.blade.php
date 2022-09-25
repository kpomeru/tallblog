@props(['color'])

<div>
    @isset($color)
        @php
            $file = '/images/tallblog-logomark';

            if($color === 'white') {
                $file .= "-white";
            }
        @endphp
        <img src="{{ asset($file . '.svg') }}" class="h-10 md:h-12" alt="TallBlog Logo" />
    @else
        <img src="{{ asset('/images/tallblog-logomark.svg') }}" class="h-10 md:h-12 dark:hidden" alt="TallBlog Logo" />
        <img src="{{ asset('/images/tallblog-logomark-white.svg') }}" class="h-10 md:h-12 hidden dark:block" alt="TallBlog Logo" />
    @endisset
</div>
