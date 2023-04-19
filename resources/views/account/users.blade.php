@extends('layouts.app')

@section('title')
    All Users
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12  col-md-8">

                <div class="container border mb-3 py-2 rounded">
                    <div class="row d-flex flex-row justify-content-between">
                        <div class="col-12 col-md-4">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword-users" id="keyword-users" placeholder="Search users...">
                                    <button type="button" id="search-users" class="search-button bg-primary rounded-end">
                                        <div class="input-group-text bg-primary border border-0">
                                            <i class="fa-solid fa-magnifying-glass text-light"></i>
                                        </div>
                                    </button>
                                </div>
                            </form>

                        </div>
                        <div class="col-12 col-md-2 mt-3 mt-md-0">
                            <select id="sortUsers" class="form-select form-select-sm fs-6">
                                <option selected value="desc">Sort By</option>
                                <option value="desc">Newer</option>
                                <option value="asc">Older</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="container">
                    @forelse($users as $user)
                        <div class="card mb-3 user-card">
                            <a href="{{route('user', $user->id)}}" class="text-dark">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 d-flex flex-row justify-content-start align-items-center">
                                            <img width="45px" height="45px" class="rounded-circle me-3" src="{{$user->profilePicture ? $user->profilePicture->url : asset('/images/default_profile.png')}}" />

                                            <h5 class="mb-0">{{$user->username}}</h5>
                                        </div>

                                        <div class="col-4 d-flex flex-row justify-content-end align-items-center">
                                            <small class="mb-0">Joined {{$user->created_at->diffForHumans()}}</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="alert alert-primary mt-4" role="alert">
                            <p class="text-center fs-5 mb-0">No users found...</p>
                        </div>
                    @endforelse
                    <div class="container">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
