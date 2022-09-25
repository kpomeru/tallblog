<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
{{-- {{ $slot }} --}}
<img src="{{ asset('/images/tallblog-logomark.svg') }}" class="h-16 w-auto" alt="TallBlog Logo" />
@endif
</a>
</td>
</tr>
