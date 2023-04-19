<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand fs-3" href="{{route('home')}}">Social.io</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts')}}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('all-users')}}">Users</a>
                </li>
                @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user' , auth()->user()->id)}}">My Account</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="https://cabraja.github.io/" target="_blank">Author</a>
                </li>

                @auth()
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
                @endauth

                @if(auth()->user() && auth()->user()->role->name == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin')}}">Admin Panel</a>
                    </li>
                @endif
            </ul>
            <div class="d-flex align-items-center" >
                @auth
                    <a href="{{route('user' ,auth()->user()->id)}}" id="profile-info" class="text-decoration-none d-flex align-items-center p-1 me-4 px-3">
                        <div class="profile-picture-small" style="background-image: url({{isset(auth()->user()->profilePicture->url) ? auth()->user()->profilePicture->url : url('/images/default_profile.png')}})">

                        </div>
                        <p class="text-light mb-0 fs-5">Howdy, {{auth()->user()->username}}</p>
                    </a>
                @endauth

                @guest
                    <a href="{{route('login')}}" class="btn btn-outline-warning fs-5 px-4" >Login</a>
                @endguest

                @auth
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger fs-5 px-4">Logout</button>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</nav>
