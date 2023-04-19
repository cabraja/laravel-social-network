@extends('layouts.app')

@section('title')
    My Account
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="container bg-dark  rounded text-white p-4 d-flex flex-column align-items-center">
                    @if(auth()->user() &&auth()->user()->id == $user->id)
                        <h2>My Profile</h2>
                    @else
                        <h2>Profile Info</h2>
                    @endif

                    <div class="profile-picture-large mt-3" style="background-image: url({{isset($user->profilePicture->url) ? $user->profilePicture->url : url('/images/default_profile.png')}})"></div>

                    <h4 class="mt-3 mb-0 fs-1">{{$user->username}}</h4>
                    <small class="text-light">Joined {{$user->created_at->diffForHumans()}}</small>


                    @if(auth()->user() && auth()->user()->id == $user->id)
                        <form class="mt-4" method="post" action="{{route('edit-profile-picture', $user->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Edit profile picture</label>
                                <input class="form-control" type="file" name="image">
                                @error('image')
                                <p class="text-danger mb-0 mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mx-auto d-block fs-5 px-5">Edit</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="col-12 col-md-8">
                @if(session('status'))
                    <div class="alert alert-{{session('status') == '200' ? 'success' : 'danger' }} text-center" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="container rounded p-4">
                    @if(auth()->user() && auth()->user()->id == $user->id)
                        <h2 class="fw-bold">My Posts</h2>
                    @else
                        <h2 class="fw-bold">Users Posts</h2>
                    @endif
                    <hr />
                        <div class="container">
                            {{$posts->links()}}
                        </div>
                        @forelse($posts as $post)
                            <x-post :post="$post"/>
                        @empty
                            <div class="alert alert-primary" role="alert">
                                <p class="text-center fs-5 mb-0">No posts yet...</p>
                            </div>
                        @endforelse
                        <div class="container">
                            {{$posts->links()}}
                        </div>
                </div>
            </div>


        </div>

    </div>
@endsection
