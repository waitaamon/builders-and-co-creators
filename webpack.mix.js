const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'public/vendor/js/modernizr.js',
        'public/vendor/js/plugins.js',
        'public/vendor/js/main.js'
    ], 'public/js/main.js')
    .scripts([
        'public/vendor/js/jquery.easing.min.js',
        'public/vendor/js/admin.min.js'
    ], 'public/js/admin.js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'public/vendor/css/admin.min.css'
    ], 'public/css/admin.css')
    .styles([
        'public/vendor/css/base.css',
        'public/vendor/css/vendor.css',
        'public/vendor/css/main.css'
    ], 'public/css/main.css');
