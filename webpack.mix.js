const mix = require("laravel-mix");
require('laravel-mix-purgecss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/auth/js/app.js', 'public/auth/js').postCss('resources/assets/auth/css/app.css', 'public/auth/css', [
    require('postcss-import'),
    require('tailwindcss'),
]);

mix.copyDirectory("resources/assets/admin/fonts", "public/admin/fonts");
mix.copyDirectory("resources/assets/admin/vendor/@fortawesome/fontawesome-free/webfonts", "public/admin/webfonts");
mix.copy('resources/assets/admin/vendor/tinymce-filemanager.js', 'public/admin/js/tinymce-filemanager.js');

mix.styles(
    [
        "resources/assets/admin/css/argon.css",
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

mix.styles(
    [
        "resources/assets/admin/vendor/select2/dist/css/select2.min.css",
    ],
    "public/admin/css/forms.css"
);

mix.styles(
    [
        "resources/assets/admin/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css",
        "resources/assets/admin/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css",
        "resources/assets/admin/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css"
    ],
    "public/admin/css/vendor-datatables.css"
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

mix.scripts(
    [
        "resources/assets/admin/vendor/select2/dist/js/select2.min.js",
        "resources/assets/admin/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
        "resources/assets/admin/vendor/moment.min.js",
        "resources/assets/admin/vendor/bootstrap-datetimepicker.js",
        "resources/assets/admin/vendor/nouislider/distribute/nouislider.min.js",
        "resources/assets/admin/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js",
    ],
    "public/admin/js/forms.js"
);

mix.scripts(
    [
        "resources/assets/admin/vendor/datatables.net/js/jquery.dataTables.min.js",
        "resources/assets/admin/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js",
        "resources/assets/admin/vendor/datatables.net-buttons/js/dataTables.buttons.min.js",
        "resources/assets/admin/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js",
        "resources/assets/admin/vendor/datatables.net-buttons/js/buttons.html5.min.js",
        "resources/assets/admin/vendor/datatables.net-buttons/js/buttons.flash.min.js",
        "resources/assets/admin/vendor/datatables.net-buttons/js/buttons.print.min.js",
        "resources/assets/admin/vendor/datatables.net-select/js/dataTables.select.min.js"
    ],
    "public/admin/js/vendor-datatables.js"
);

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
