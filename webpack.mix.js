const mix = require('laravel-mix');
mix.disableNotifications();
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

mix.js('resources/js/mall/app.js', 'public/js/mall')
    .postCss('resources/css/mall/app.css', 'public/css/mall', [
        require("tailwindcss"),
        require("autoprefixer")
    ])
    .scripts('resources/js/mall/script.js', 'public/js/mall/script.js');
/*
mix.js('resources/js/admin/app.js', 'public/js/admin')
    .sass('resource/sass/app.scss', 'public/css/admin')*/
