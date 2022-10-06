@component('mail::message')
# New Post Comment

Hello **{{ $comment->post->user->username }}**

You have a new comment on your post **{{ $comment->post->title }}**, by "*{{ $comment->user->username }}*"

@component('mail::panel')
`{{ $comment->comment }}`
@endcomponent

@component('mail::button', ['url' => route('post', ['post' => $comment->post])])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
