let mix = require('laravel-mix');

mix
    .autoload({
        jquery: ["$", "window.jQuery"],
    })
    // .postCss("src/css/app.css", "style.css", [
    //     require('postcss-custom-properties')
    // ])
    .sourceMaps(true, "inline-source-map")
    .options({
        processCssUrls: false,
    })
    .js('src/js/app.js', 'dist/app.js')
    .browserSync({
        files: ["./**/*.*"],
        proxy: {
            target: process.env.BROWSER_SYNC_URL,
        },
    });