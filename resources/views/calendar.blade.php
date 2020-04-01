@extends('layouts.app')

@section('content')


    <calendar data-category="{{json_encode($category)}}"></calendar>
    @endsection