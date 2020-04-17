@extends('layouts.app')

@section('content')

    <category data-category="{{json_encode($category)}}"></category>

    @endsection