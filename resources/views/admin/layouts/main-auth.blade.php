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
    <div class="main-content">
        <div class="header bg-gradient-info py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <img src="{{ asset('images/logo190x50px.png') }}" class="navbar-brand-img" width="150px" alt="Logo">
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('/admin/js/vendor.js') }}"></script>
    @stack('js')
</body>
</html>
