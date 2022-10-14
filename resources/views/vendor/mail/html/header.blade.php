<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="{{ asset('/images/tallblog-logomark.png') }}" height="64" width="auto" alt="TallBlog Logo" />
{{-- <img src="https://tallblog.kpomeru.com/images/tallblog-logomark.png" height="64" width="auto" alt="TallBlog Logo" /> --}}
@endif
</a>
</td>
</tr>
