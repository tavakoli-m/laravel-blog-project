<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    <section id="app">
        @include('admin.layouts.top-nav')
        <section class="container-fluid">
            <section class="row">
                <section class="col-md-2 p-0">
                    @include('admin.layouts.sidebar')
                </section>
                <section class="col-md-10 pb-3">
                    @yield('content')
                </section>
            </section>
        </section>


    </section>


    @include('admin.layouts.scripts')
    @yield('script')
</body>

</html>