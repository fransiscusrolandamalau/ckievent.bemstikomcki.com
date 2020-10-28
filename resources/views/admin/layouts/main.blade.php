<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.meta')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link href="{{ mix('/admin/css/vendor.css') }}" rel="stylesheet">
    @yield('stylesheet')
    <link type="text/css" href="{{ mix('/admin/css/admin.css') }}" rel="stylesheet">

    @include('admin.layouts.partials.favicons')

    <script src="{{ mix('/admin/js/admin.js') }}" defer></script>

    @include('admin.layouts.partials.analytics')
</head>

<body>
    <script>/* Empty script tag because Firefox has a FOUC */</script>
    @include('admin.layouts.partials.sidebar')
    <div class="main-content" id="panel">
        @include('admin.layouts.partials.nav')
        <div class="header bg-info pb-5">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--6">
            @yield('content')
            @include('admin.layouts.partials.footer')
        </div>
    </div>
    @yield('modal')

    <script src="{{ mix('/admin/js/vendor.js') }}"></script>
    @stack('js')
</body>
</html>
