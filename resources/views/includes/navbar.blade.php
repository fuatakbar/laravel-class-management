<nav class="navbar navbar-expand-lg navbar-dark py-3">
    <a class="navbar-brand text-white" href="{{route('dashboard')}}">
        Class Management
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <div class="navbar-nav">
            <ul class="navbar-nav mr-auto">
                <div class="row justify-content-end mt-4 mb-3 ml-1 d-lg-none d-block">
                    <div class="col-12 text-center">
                        <a href="#">
                            <button class="btn btn-primary">
                                Logout
                            </button>
                        </a>
                    </div>
                </div>
            </ul>
        </div>
    </div>

    {{-- logout button desktop --}}
    <div class="col-12 col-lg-6 text-right d-none d-lg-block">
        <span class="text-white pr-3">Welcome, Fuat as User </span>
        <a href="http://">
            <button class="btn btn-primary">
                Logout
            </button>
        </a>
    </div>
</nav>