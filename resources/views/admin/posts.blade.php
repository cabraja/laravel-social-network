<div class="row mt-4">
    <div class="col-12">
        <h2>Posts Info</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                All Posts
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Message</th>
                        <th scope="col">User</th>
                        <th scope="col">Has Image</th>
                        <th scope="col">Time</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($posts as $post)
                        <tr>
                            <td>{{$post->body}}</td>
                            <td>{{$post->user->username}}</td>
                            <td>{{$post->image ? 'Yes' : 'No'}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('edit-post', $post->id)}}">
                                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('delete-post', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>No posts as of now...</p>
                    @endforelse
                    </tbody>
                </table>

                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>

