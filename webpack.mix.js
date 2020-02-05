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

mix
    .js('resources/js/master.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/his-page.js', 'public/js')
    .js('resources/js/org-page.js', 'public/js')
    .sass('resources/sass/style.sass', 'public/css');
