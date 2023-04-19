
<div class="row">
    <div class="col-12 col-xl-6 mt-4">
        <h2>Logs and reports</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                All Logs
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Message</th>
                        <th scope="col">User</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($logs as $log)
                        <tr>
                            <td>{{$log->message}}</td>
                            <td>{{$log->user->username}}</td>
                            <td>{{$log->created_at->diffForHumans()}}</td>
                        </tr>
                    @empty
                        <p>No reports as of now...</p>
                    @endforelse
                    </tbody>
                </table>

                {{$logs->links()}}
            </div>
        </div>
    </div>


    <div class="col-12 col-xl-6 mt-4">
        <h2>Users</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                All Users
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joined</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                @if(auth()->user()->id != $user->id)
                                    <form   action="{{route('delete-user', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i  class="fa-solid fa-trash"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <p>No reports as of now...</p>
                    @endforelse
                    </tbody>
                </table>

                {{$users->links()}}
            </div>
        </div>
    </div>

</div>

