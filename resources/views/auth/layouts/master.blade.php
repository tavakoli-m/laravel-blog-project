<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    <section id="app">

        <section style="height: 100vh; background-color: #138496;" class="d-flex justify-content-center align-items-center">
            <section style="width: 20rem;">
                <h1 class="bg-warning rounded-top px-2 mb-0 py-3 h5">login / register</h1>
                <section class="bg-light my-0 px-2"><small class="text-danger"></small></section>
                @yield('content')
            </section>
        </section>

    </section>
    @include('admin.layouts.scripts')
    @yield('script')
</body>

</html>