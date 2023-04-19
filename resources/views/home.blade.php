@extends('layouts.app')

@section('title')
Homepage
@endsection
@section('content')
<div class="container-fluid p-0" id="landing-image" style="background-image: url({{asset('/images/landing-image.jpg')}})">
    <div class="container-fluid p-0 d-flex  justify-content-center align-items-center" id="landing-inside">
        <div class="container d-flex flex-column justify-content-center align-items-center p-5 text-light" id="landing-text">
            <h2 class="fs-1">Welcome to Social.io</h2>
            <p class="fs-4">A place to socialize with friends all around the world and express yourself.</p>
            <a class="btn btn-warning fs-4 px-5" href="{{route('login')}}">Begin</a>
        </div>
    </div>
</div>

    <div class="container-fluid">
        <div class="row">
            <div class="grid-image col-12 col-md-6" style="background-image: url({{asset('/images/grid-1.jpg')}})"></div>
            <div class="col-12 col-md-6 grid-text">
                <h3 class="fs-1 fw-bold mb-3">Socialize everywhere</h3>
                <p class="fs-4">
                    With Social.io, you can contact your friends and see what is new anywhere, everywhere. With a few simple clicks you can post about your day or snap a picture of your adventures.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 grid-text">
                <h3  class="fs-1 fw-bold mb-3">Simple User Inteface</h3>
                <p class="fs-4">
                    Social.io has a very intuitive design and user interface. It is easy to navigate and explore. Beautiful color scheme and simple design make using the website more enjoyable than ever.
                </p>
            </div>
            <div class="grid-image col-12 col-md-6" style="background-image: url({{asset('/images/grid-2.jpg')}})"></div>
        </div>

    </div>

@include('includes.footer')
@endsection
