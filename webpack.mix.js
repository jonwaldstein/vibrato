let mix = require('laravel-mix');
let path = require('path');

mix.setPublicPath('./');
mix.setResourceRoot('../');

mix.alias({
    '@': path.join(__dirname, 'resources/js')
});

mix.js("resources/js/app.js", "public/js")
    .copyDirectory('resources/fonts/', 'public/fonts/')
    .copyDirectory('resources/images/', 'public/images/')
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);

if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    })
    .sourceMaps();
}
