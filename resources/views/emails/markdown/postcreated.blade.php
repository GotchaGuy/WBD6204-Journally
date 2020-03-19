@component('mail::message')
# Post Published

You successfully published a post with the title: {{$post->title}}

@component('mail::button', ['url' => 'http://lp.test/home', 'color' => 'success'])
View your post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
