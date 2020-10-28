<!DOCTYPE html>
<html lang="en">
    <head>
        @include('landing.layouts.partials.meta')

        <link href="{{ mix('landing/css/vendor.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css" rel="stylesheet">
        @yield('stylesheet')
        <link href="{{ mix('landing/css/landing.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{ mix('landing/css/color.css') }}" rel="stylesheet" id="color-opt">

        @include('landing.layouts.partials.favicons')

        <script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js" defer></script>
        <script src="{{ mix('landing/js/landing.js') }}" defer></script>

        @include('landing.layouts.partials.analytics')
    </head>
    <body>
        @include('landing.layouts.partials.nav')
        @yield('banner')
        @yield('content')
        @include('landing.layouts.partials.footer')

        <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>

        <script type="text/javascript" src="{{ mix('landing/js/vendor.js') }}"></script>
        @include('landing.layouts.partials.tawk-to')
        @stack('js')
    </body>
</html>

