@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron row">
            <div class="col-md-6">
            <h1 class="display-2"> 404Error!</h1>
            <p class="lead">Page not found. Sorry about that.</p>
            </div>
            <div class="col-md-6 img">
                <img class="img-fluid rounded" src="/images/PNG404clear.png" alt="">
            </div>
            <hr class="my-4">
            <p>Return home?</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">NOTES</a>
            </p>
        </div>

    </div>
@endsection
