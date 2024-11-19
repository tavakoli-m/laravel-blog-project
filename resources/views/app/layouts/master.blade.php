<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    <section id="app">

    @include('app.layouts.top-nav')

        <section class="container my-5">
            @yield('content')
        </section>


    </section>


    @include('admin.layouts.scripts')
    @yield('script')
</body>

</html>