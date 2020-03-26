@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron row">
            <div class="col-md-6">
                <h1 class="display-1"> Dear 404,</h1>
                <p class="lead">this is an Error! Sorry about that.</p>
                <p>Sincerely,</p>
                <p>The Journally Team</p>
            </div>
            <div class="col-md-6 img">
                <img class="img-fluid rounded" src="/images/PNG404clear.png" alt="error_404_image">
            </div>
            <hr class="my-4">
                <a class="btn btn-primary btn-lg mt-3 align-bottom-right" href="/home" role="button">NOTES</a>
            </p>
        </div>

    </div>
@endsection
