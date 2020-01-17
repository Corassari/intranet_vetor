let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/auth/login.js', 'public/js/auth')
    .js('resources/assets/js/admin/user.js', 'public/js/admin')
    // .js('resources/assets/js/follow-up/supplies/order.js', 'public/js/follow-up/supplies')
    .sass('resources/assets/sass/app.scss', 'public/css');