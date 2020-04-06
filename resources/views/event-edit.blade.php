@extends('layouts.app')

@section('content')


    <event-edit data-event="{{json_encode($event)}}"></event-edit>

    @endsection