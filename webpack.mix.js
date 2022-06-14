let mix = require('laravel-mix');

let dist = 'public/themes/urent';
let node_modules = `${__dirname}/node_modules`;
let vendor = `${dist}/vendor`;
let resources = `${__dirname}/resources`;
let resourceAssets = `${resources}/assets`;

if(!isProduction) {
    mix
        .sourceMaps(true, 'source-map')
        .webpackConfig({devtool: 'source-map'});
}

mix
    .sass(`${__dirname}/resources/assets/sass/bootstrap.scss`, `${dist}/css`)
    .sass(`${__dirname}/resources/assets/sass/preloader.scss`, `${dist}/css`)
    .sass(`${__dirname}/resources/assets/sass/theme/theme.scss`, `${dist}/css`);

mix.copy(`${__dirname}/resources/assets`, `${__dirname}/assets`);

mix.combine([`${resourceAssets}/js/theme.js`], `${dist}/js/theme.min.js`);

if(!isProduction) {
    mix
        .browserSync({
        proxy: 'ugm.local',
        files: [__dirname + '/**/*.*']
    });
} else {
    mix.version();
}