const mix = require('laravel-mix')

mix.js('resources/js/site.js', 'public/js/site.js')
    .sourceMaps(false)

mix.postCss('resources/css/site.css', 'public/css/site.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-focus-visible'),
    require('autoprefixer'),
])

mix.options({
    cssNano: { minifyFontValues: false }
});

mix.webpackConfig({
    stats: {
        children: false,
    },
});

mix.browserSync({
    proxy: process.env.APP_URL,
    host: process.env.APP_URL.split('//')[1],
    open: 'external',
    files: [
        'resources/views/**/*.html',
        'public/**/*.(css|js)',
    ],
    // Option to open in non default OS browser.
    // browser: "firefox",
    notify: false
})

mix.version()
