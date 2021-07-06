const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/vue')
    .sass('resources/sass/app.scss', 'public/vue');

if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    }).sourceMaps()
} else {
    mix.version()
}
