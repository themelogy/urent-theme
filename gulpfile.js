var gulp = require('gulp');
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');
var del = require('del');
var themeInfo = require('./theme.json');

process.env.DISABLE_NOTIFIER = true;

elixir.config.publicPath = 'assets';
//elixir.config.sourcemaps = true;

var publicPath = '../../public';
var themePath = publicPath + '/themes/urent';
var cssPath = themePath + '/css';
var jsPath =  themePath + '/js';

var Task = elixir.Task;

elixir.extend('del', function(path) {
    new Task('del', function() {
        return del(path, {force:true});
    });
});

elixir.extend('stylistPublish', function() {
    new Task('stylistPublish', function() {
        return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
    });
});

elixir(function (mix) {

    // mix.sass('bootstrap.scss', cssPath + '/bootstrap.min.css')
    //     .sass('theme/theme.scss', cssPath + '/theme.min.css');

   mix.del(['assets/css', 'assets/js']);
   mix.del(themePath+'/**');

   mix.sass('bootstrap.scss', 'resources/assets/css/bootstrap.min.css')
        .sass('theme/theme.scss', 'resources/assets/css/theme.min.css')
       .sass('preloader.scss', 'resources/assets/css/preloader.css');

   mix.scripts([
       'theme.js'
   ], 'resources/assets/js/theme.min.js');

   mix.copy('resources/assets', 'assets');

   mix.version([
      'css/bootstrap.min.css',
      'css/theme.min.css',
      'js/theme.min.js'
   ], 'assets');

   mix.stylistPublish();

});