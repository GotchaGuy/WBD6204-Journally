@extends('layouts.app')

@section('content')
<div class="container">

    <post-form></post-form>
    <posts data-posts="{{ json_encode($posts) }}"></posts>

</div>
@endsection
