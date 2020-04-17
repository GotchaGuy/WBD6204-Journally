@extends('layouts.app')

@section('content')
<div class="container">

    <post-form data-categories="{{ json_encode($categories) }}"></post-form>
    <posts data-posts="{{ json_encode($posts) }}"></posts>

{{--    {{ $posts->onEachSide(2)->links() }}--}}

</div>
@endsection
