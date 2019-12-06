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

mix.copyDirectory('node_modules/ckeditor/plugins', 'public/vendor/ckeditor/plugins')
   .copyDirectory('node_modules/ckeditor/skins', 'public/vendor/ckeditor/skins')
   .copyDirectory('node_modules/ckeditor/skins', 'public/vendor/ckeditor/skins')
   .copyDirectory('node_modules/ckeditor/lang', 'public/vendor/ckeditor/lang')
   .copy('node_modules/ckeditor/ckeditor.js', 'public/vendor/ckeditor')
   .copy('node_modules/ckeditor/config.js', 'public/vendor/ckeditor')
   .copy('node_modules/ckeditor/styles.js', 'public/vendor/ckeditor')
   .copy('node_modules/ckeditor/contents.css', 'public/vendor/ckeditor');