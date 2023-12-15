<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Short Url</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                <ul class="nav " >
                    @if (Route::has('login'))

                        @auth
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>

                        @else
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ url('/login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="{{ url('/register') }}">Register</a>
                                </li>
                            @endif

                        @endauth

                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
