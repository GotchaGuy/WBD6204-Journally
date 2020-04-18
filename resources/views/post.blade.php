@extends('layouts.app')

@section('content')

    <post data-post="{{json_encode($post)}}" data-categories="{{json_encode($categories)}}"></post>

    @endsection