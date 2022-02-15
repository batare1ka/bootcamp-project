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

mix.js('resources/js/app.js', 'public/assets/js')
    .js('resources/js/cart/cart.js', 'public/assets/js')
    .js('resources/js/blog/blog.js', 'public/assets/js')
    .postCss('resources/css/login.css', 'public/assets/css')
    .postCss('resources/css/shop.css', 'public/assets/css')
    .postCss('resources/css/sproduct.css', 'public/assets/css')
    .postCss('resources/css/style.css', 'public/assets/css');
