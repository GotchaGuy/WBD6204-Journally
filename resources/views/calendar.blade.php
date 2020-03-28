@extends('layouts.app')

@section('content')


    <calendar data-post="{{json_encode($grouped)}}></calendar>

    @endsection