const mix = require('laravel-mix');
require('laravel-mix-modernizr');

mix.js('resources/js/site.js', 'public/js/site.js')
    .modernizr({
        Modernizr: 'modernizr.config.js'
    })
    .sourceMaps()

mix.postCss('resources/css/site.css', 'public/css/site.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    require('autoprefixer'),
]);  

mix.browserSync({
    proxy: process.env.APP_URL,
    files: ['public/themes/**/**/*.(html|css|js)', 'site/content/**/**/*.(md|yaml)'],
    notify: false
});

mix.version();