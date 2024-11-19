<nav class="navbar navbar-expand-lg navbar-dark bg-blue ">

    <a class="navbar-brand " href=" ">PHP tutorial</a>
    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarSupportedContent " aria-controls="navbarSupportedContent " aria-expanded="false " aria-label="Toggle navigation ">
        <span class="navbar-toggler-icon "></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent ">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active ">
                <a class="nav-link " href="{{ route('app.index') }}">Home <span class="sr-only ">(current)</span></a>
            </li>

            @foreach ($categories as $category)
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('app.category',$category) }}">{{ $category->name }}</a>
            </li>
            @endforeach

        </ul>
    </div>

    <section class="d-inline ">

    @guest
        <a class="text-decoration-none text-white px-2 " href="{{ route('app.register') }}">register</a>
        <a class="text-decoration-none text-white " href="{{ route('app.login') }}">login</a>
    @endguest
        @auth
        <a class="text-decoration-none text-white px-2 " href="{{ route('app.logout') }}">logout</a>
        @endauth
    </section>
</nav>