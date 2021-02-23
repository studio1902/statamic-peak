const mix = require('laravel-mix')

mix.js('resources/js/site.js', 'public/js/site.js')
    .sourceMaps(false)

mix.options({
    postCss: [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
        require('postcss-focus-visible'),
        require('autoprefixer'),
    ], 
})

// Separate compiliation steps so edits to just `resources/css/custom.css` will compile blazingly fast.
mix.postCss('resources/css/theme.css', 'public/css/theme.css')
mix.postCss('resources/css/utilities.css', 'public/css/utilities.css')
mix.combine(['./public/css/theme.css', './public/css/utilities.css'], 'public/css/site.css')

mix.browserSync({
    proxy: process.env.APP_URL,
    files: [
        'resources/views/**/*.html', 
        'public/**/*.(css|js)', 
    ],
    // Option to open in non default OS browser.
    // browser: "firefox",
    notify: false
})

mix.version()