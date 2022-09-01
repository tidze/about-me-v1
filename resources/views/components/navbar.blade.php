<nav class="navbar navbar-expand ">
    <div class="container-fluid border-b-2 pb-2">
        <a class="navbar-brand dark:text-white text-white" href="#">Built With Laravel</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('user.home'))
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('user.home', ['user_id' => Auth::user()->id]) }}"
                                class="dark:text-white text-white nav-link">Home</a>
                        </li>
                    @else
                        @if (Route::has('user.login'))
                            <li class="dark:text-white text-white nav-item ">
                                <a href="{{ route('user.login') }}" class="dark:text-white text-white p-2">Log in</a>
                            </li>
                        @endif
                        @if (Route::has('user.register'))
                            <li class="nav-item">
                                <a href="{{ route('user.register') }}" class="dark:text-white text-white p-2">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>


    </div>
</nav>
