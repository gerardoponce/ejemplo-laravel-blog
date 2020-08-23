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
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .scripts([
        'resources/js/ckeditor/ckeditor.js'
    ], 'public/js/ckeditor/ckeditor.js')
    .scripts([
        'resources/js/ckeditor/es.js'
    ], 'public/js/ckeditor/es.js')
    .copy( 'resources/img/*', 'public/img' );
    