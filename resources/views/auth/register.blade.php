@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="container  mt-5 p-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-7">
                <form method="post" action="{{route('register')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') border-danger border-3 @enderror" name="username" value="{{old('username')}}">
                        <div class="form-text">Must be at least 6 characters long.</div>
                        @error('username')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control  @error('email') border-danger border-3 @enderror" name="email" value="{{old('email')}}">
                        <div class="form-text">We'll never share your email with anyone else.</div>
                        @error('email')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control  @error('password') border-danger border-3 @enderror" name="password">
                        <div class="form-text">Must be at least 8 characters long and must include a number.</div>
                        @error('password')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm password</label>
                        <input type="password" class="form-control  @error('password_confirmation') border-danger border-3 @enderror" name="password_confirmation">
                        @error('password_confirmation')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Profile picture (optional)</label>
                        <input class="form-control" type="file" name="image">
                        @error('image')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mx-auto d-block fs-5 px-5">Register</button>
                </form>
            </div>

        </div>
    </div>
@endsection
