const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        alias: {
            '@vendor': path.resolve(__dirname, 'resources/vendor/'),
        }
    }
});

mix
    .js('resources/js/Site/master.js', 'public/js')
    .js('resources/js/Site/home.js', 'public/js')
    .sass('resources/sass/style.sass', 'public/css');