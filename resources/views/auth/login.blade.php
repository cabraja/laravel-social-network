@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="container  mt-5 p-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-7">
                <form method="post" action="{{route('login')}}">
                    @csrf

                    @if(session('status'))
                        <div class="alert alert-{{session('status') == '200' ? 'success' : 'danger' }} text-center" role="alert">
                            {{session('message')}}
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control  @error('email') border-danger border-3 @enderror" name="email" value="{{old('email')}}">
                        @error('email')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control  @error('password') border-danger border-3 @enderror" name="password">
                        @error('password')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mx-auto d-block fs-5 px-5">Login</button>
                </form>
                <p class="text-center mt-3">Don't have an account? <a href="{{route('register')}}">Register here.</a></p>
            </div>

        </div>
    </div>
@endsection
