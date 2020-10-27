<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="CKI Event brings people together through live experiences. Discover events that match your passions">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

        <!-- Vendor -->
        <link href="{{ mix('admin/css/vendor.css') }}" rel="stylesheet">
        @yield('stylesheet')

        <!-- Argon CSS -->
        <link type="text/css" href="{{ mix('admin/css/admin.css') }}" rel="stylesheet">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172956857-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-172956857-3');
        </script>
    </head>
    <body>
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

        <!-- Vendor -->
        <script src="/admin/js/vendor.js"></script>
        @stack('js')

        <!-- Argon JS -->
        <script src="/admin/js/admin.js"></script>
    </body>
</html>
