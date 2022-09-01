<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="container-fluid border-b-2 pb-2">
        <a class="navbar-brand" href="#">Built With Laravel</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('user.home'))
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('user.home', ['user_id' => Auth::user()->id]) }}"
                                class="nav-link">Home</a>
                        </li>
                    @else
                        @if (Route::has('user.login'))
                            <li class="nav-item">
                                <a href="{{ route('user.login') }}" class="nav-link">Log in</a>
                            </li>
                        @endif
                        @if (Route::has('user.register'))
                            <li class="nav-item">
                                <a href="{{ route('user.register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>


    </div>
</nav>
