@extends('layouts.app')

@section('content')

    <post-edit data-post="{{json_encode($post)}}"></post-edit>

    @endsection