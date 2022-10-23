const mix = require('laravel-mix');

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

mix.styles('resources/css/style.css', 'public/css/style.css')
mix.styles('resources/css/alert.css', 'public/css/alert.css')
mix.js('resources/js/app.js', 'public/js/app.js')
mix.js('resources/js/basket.js', 'public/js/basket.js')
mix.js('resources/js/alert.js', 'public/js/alert.js')
mix.js('resources/js/index.js', 'public/js/index.js')