const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue() // Add this line
    .postCss('resources/css/app.css', 'public/css', [
        // PostCSS plugins...
    ]);
