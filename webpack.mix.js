const mix = require("laravel-mix");
require('laravel-mix-purgecss');

mix.copyDirectory("resources/assets/admin/fonts", "public/admin/fonts");

mix.styles(
    [
        "resources/assets/admin/css/argon.min.css",
        "resources/assets/admin/css/custom.css"
    ],
    "public/admin/css/admin.css"
);

mix.styles(
    [
        "resources/assets/admin/vendor/nucleo/css/nucleo.css",
        "resources/assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css",
    ],
    "public/admin/css/vendor.css"
);

mix.scripts(
    [
        "resources/assets/admin/js/argon.min.js"
    ],
    "public/admin/js/admin.js"
);

mix.scripts(
    [
        "resources/assets/admin/vendor/jquery/dist/jquery.min.js",
        "resources/assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js",
        "resources/assets/admin/vendor/js-cookie/js.cookie.js",
        "resources/assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js",
        "resources/assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js",
        "resources/assets/admin/js/pace.min.js",
    ],
    "public/admin/js/vendor.js"
);

// Frontend
mix.copyDirectory("resources/assets/landing/fonts", "public/landing/fonts");

mix.styles(
    [
        "resources/assets/landing/css/bootstrap.min.css",
        "resources/assets/landing/css/materialdesignicons.min.css",
        "resources/assets/landing/css/magnific-popup.css",
        "resources/assets/landing/css/owl.carousel.min.css",
        "resources/assets/landing/css/owl.theme.default.min.css",
        "resources/assets/landing/css/slick.css",
        "resources/assets/landing/css/slick-theme.css",
    ],
    "public/landing/css/vendor.css"
);

mix.styles(
    [
        "resources/assets/landing/css/style.css",
        "resources/assets/landing/css/custom.css",
    ],
    "public/landing/css/landing.css"
);

mix.styles(
    [
        "resources/assets/landing/css/colors/skyblue.css",
    ],
    "public/landing/css/color.css"
);

mix.scripts(
    [
        "resources/assets/landing/js/jquery-3.5.1.min.js",
        "resources/assets/landing/js/bootstrap.bundle.min.js",
        "resources/assets/landing/js/jquery.easing.min.js",
        "resources/assets/landing/js/scrollspy.min.js",
        "resources/assets/landing/js/jquery.magnific-popup.min.js",
        "resources/assets/landing/js/magnific.init.js",
        "resources/assets/landing/js/owl.carousel.min.js",
        "resources/assets/landing/js/owl.init.js",
        "resources/assets/landing/js/slick.min.js",
        "resources/assets/landing/js/slick.init.js",
        "resources/assets/landing/js/feather.min.js",
    ],
    "public/landing/js/vendor.js"
);

mix.scripts(
    [
        "resources/assets/landing/js/app.js",
    ],
    "public/landing/js/landing.js"
);


if (mix.inProduction()) {
    mix.purgeCss()
    mix.version();
}
