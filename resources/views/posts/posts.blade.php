@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')



    <div class="container mt-5">
       <div class="container">
           <div class="row justify-content-center">
               @if(auth()->user())
                   <div class="col-12  col-md-4">
                       @include('posts.create')
                   </div>
               @endif

               <div class="col-12  @if(auth()->user()) col-md-8 @else col-md-8 @endif">

                   @if(session('status'))
                       <div class="alert alert-{{session('status') == '200' ? 'success' : 'danger' }} text-center" role="alert">
                           {{session('message')}}
                       </div>
                   @endif

                   <div class="container border mb-2 py-2 rounded">
                       <div class="row d-flex flex-row justify-content-between">
                           <div class="col-12 col-md-4">
                               <form>
                                   <div class="input-group">
                                       <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search posts...">
                                       <button type="button" id="search" class="search-button bg-primary rounded-end">
                                           <div class="input-group-text bg-primary border border-0">
                                               <i class="fa-solid fa-magnifying-glass text-light"></i>
                                           </div>
                                       </button>
                                   </div>
                               </form>

                           </div>
                           <div class="col-12 col-md-2">
                               <select id="sortPosts" class="form-select form-select-sm fs-6">
                                   <option selected value="desc">Sort By</option>
                                   <option value="desc">Newer</option>
                                   <option value="asc">Older</option>
                               </select>
                           </div>
                       </div>
                   </div>

                   @guest
                       <div class="alert alert-warning">
                           <p class="fs-5 mb-0">Pro tip: <a href="{{route('login')}}">Login</a> in order to like posts.</p>
                       </div>
                   @endguest


                    <div class="container">
                        {{$posts->links()}}
                    </div>
                       @forelse($posts as $post)
                        <x-post :post="$post"/>
                       @empty
                       <div class="alert alert-primary mt-4" role="alert">
                          <p class="text-center fs-5 mb-0">No posts found...</p>
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
