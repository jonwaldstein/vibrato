const tailwindcss = require('tailwindcss');
let mix = require('laravel-mix');
mix.setPublicPath('./');
mix.setResourceRoot('../');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('assets/scripts/main.js', 'dist/scripts/')
   .sass('assets/styles/main.scss', 'dist/styles/')
   .copy('assets/fonts/', 'dist/fonts/')
   .copy('assets/images/', 'dist/images/')
   .options({
    processCssUrls: false,
    postCss: [
      tailwindcss('assets/scripts/tailwind.config.js')
    ],
  });

if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    })
    .sourceMaps();
}
