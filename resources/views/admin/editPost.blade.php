@extends('layouts.admin')

@section('title')
Edit Post
@endsection

@section('content')
    <div class="container  px-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 bg-light text-dark p-4 rounded mb-4 mb-md-0">

                @if(session('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{session('message')}}
                    </div>
                @endif

                <h3 class="mb-0 fw-bold">Edit Post by {{$post->user->username}}</h3>
                <hr />
                <form method="post" action="{{route('update-post', $post->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <textarea rows="5" class="form-control  @error('body') border-danger border-3 @enderror" name="body" placeholder="Write anything here...">{{$post->body}}</textarea>
                        @error('body')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <p>Current image:</p>
                        @if($post->image)
                            <img width="100%" src="{{$post->image->url}}">
                        @else
                            <div class="alert alert-secondary" role="alert">
                                This post has no image as of now.
                            </div>
                        @endif

                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">
                            @if($post->image)
                                Edit image
                            @else
                                Add an image
                            @endif
                            (optional)</label>
                        <input class="form-control" type="file" name="image">
                        @error('image')
                        <p class="text-danger mb-0 mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mx-auto d-block fs-5 px-5">Post</button>
                </form>
            </div>

        </div>
    </div>
@endsection
