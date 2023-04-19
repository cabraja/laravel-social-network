<div class="card mb-5">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div class="d-flex flex-row align-items-center">
            <img width="45px" height="45px" class="rounded-circle" src="{{$post->user->profilePicture ? $post->user->profilePicture->url : asset('/images/default_profile.png')}}" />
            <h5 class="mb-0 fw-bold ms-2">{{$post->user->username}}</h5>
        </div>

        <small class="text-dark">{{$post->created_at->diffForHumans()}} ago</small>
    </div>

    <div class="card-body row p-3">
        <p class="card-text">{{$post->body}}</p>
        @if($post->image)
            <img  class="post-image" src="{{$post->image->url}}"/>
        @endif

        <div class="d-flex flex-row justify-content-between align-items-center mt-2">

            <div class="d-flex flex-row align-items-center">
                @auth
                    @if($post->isLikedBy(auth()->user()))
                        <form action="{{route('like-post', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fa-@if($post->isLikedBy(auth()->user())){{'solid'}}@else{{'regular'}}@endif  fa-heart me-2 fs-2 love-icon" data-post-id="{{$post->id}}"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{route('like-post',$post->id)}}" method="post">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fa-@if($post->isLikedBy(auth()->user())){{'solid'}}@else{{'regular'}}@endif fa-heart me-2 fs-2 love-icon" data-post-id="{{$post->id}}"></i>
                            </button>
                        </form>
                    @endif
                @endauth

                <p class="mb-1">{{$post->likes->count()}} {{$post->likes->count() == 1 ? 'person loves': 'people love' }} this post</p>
            </div>

            @if(auth()->user() && ($post->user->id == auth()->user()->id || auth()->user()->role->name == 'Admin'))
                <form action="{{route('delete-post', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            @endif
        </div>

    </div>
</div>
