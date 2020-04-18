@extends('layouts.app')

@section('content')

    <post-form data-categories="{{ json_encode($categories) }}"></post-form>
    <posts data-posts="{{ json_encode($posts) }}"></posts>

@endsection
