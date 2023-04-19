@extends('layouts.app')

@section('title')
    Contact
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                @if(session('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{session('message')}}
                    </div>
                @endif

                <form action="{{route('send-message', auth()->user()->id)}}" method="post">
                    @csrf
                    <h2 class="fw-bold">Contact our admin</h2>
                    <hr >

                    <div class="mb-4">
                        <label for="body" class="form-label">Your message</label>
                        <textarea rows="5" class="form-control  @error('body') border-danger border-3 @enderror" name="body" placeholder="Write anything here..." value="{{old('body')}}"></textarea>
                        @error('body')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mx-auto d-block fs-5 px-5">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
