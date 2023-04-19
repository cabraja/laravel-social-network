<div class="row mt-4">
    <div class="col-12">
        <h2>Messages</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                All Messages
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Message</th>
                        <th scope="col">User</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($messages as $message)
                        <tr>
                            <td>{{$message->body}}</td>
                            <td>{{$message->user->username}}</td>
                            <td>{{$message->created_at->diffForHumans()}}</td>
                            <td>
                                <form action="{{route('delete-message', $message->id)}}"  method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>No messages as of now...</p>
                    @endforelse
                    </tbody>
                </table>

                {{$messages->links()}}
            </div>
        </div>
    </div>
</div>
