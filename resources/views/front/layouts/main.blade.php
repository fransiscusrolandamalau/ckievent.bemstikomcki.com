<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @hasSection('title')
            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }} - Discover Great Events</title>
        @endif
        <meta name="title" content="CKI Event - Discover Great Events">
        <meta name="description" content="CKI Event brings people together through live experiences. Discover events that match your passions">

        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- Vendor -->
        <link rel="stylesheet" href="{{ mix('landing/css/vendor.css') }}" type="text/css">
        @yield('stylesheet')
        <!-- Main Css -->
        <link href="{{ mix('landing/css/landing.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{ mix('landing/css/color.css') }}" rel="stylesheet" id="color-opt">


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
        @include('front.layouts.partials.header')
        @yield('banner')
        @yield('content')
        @include('front.layouts.partials.footer')

        <!-- Vendor -->
        <script src="{{ mix('landing/js/vendor.js') }}"></script>

        <!-- Main Js -->
        <script src="{{ mix('landing/js/landing.js') }}"></script>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5f553948f0e7167d000de3f6/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        @stack('js')
    </body>
</html>
