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


mix.webpackConfig(require('./webpack.config'));
mix.setPublicPath('../public');
mix.react('resources/js/polyfill.js', '../public')
mix.react('resources/js/polyfill-es5.js', '../public')
mix.react('resources/js/polyfill-es6.js', '../public')
mix.react('resources/js/polyfill-next.js', '../public')
    .version()
    .sourceMaps();
