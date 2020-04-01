@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <img src="/images/PNG404clear.png" alt="404error" class="card-img-top error">
                <div class="card-header"><strong>Dear 404,</strong></div>
                <div class="card-body">
                    <div class="card-text">you are not supposed to be here. Sorry about that.</div>
                    <a class="btn btn-primary mt-3 float-right" href="/home" role="button">Notes</a>
                </div>

            </div>
        </div>

    </div>
@endsection
