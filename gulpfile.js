var elixir = require('laravel-elixir');
var gulp = require('gulp');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //FRONTEND

    mix.sass([
        '../default/sass/app.scss'
    ], 'public/assets/default/css/custom.css');

    mix.styles([
        '../default/css/bootstrap.min.css',
        '../default/css/modern-business.css',
        '../default/font-awesome/css/font-awesome.min.css',
        '../../../public/assets/default/css/custom.css'
    ], 'public/assets/default/css');

    mix.scripts([
        '../default/js/jquery.js',
        '../default/js/bootstrap.min.js'
    ], 'public/assets/default/js');

    mix.copy('resources/assets/default/fonts', 'public/assets/default/fonts');
    mix.copy('resources/assets/default/font-awesome/fonts', 'public/assets/default/fonts');
});

elixir(function(mix) {
    var bower = '../../../bower_components/';
    var admin = 'AdminLTE/';
    //BACKEND
    mix.sass([
        '../backend/sass/app.scss'
    ], 'public/assets/backend/css/custom.css');

    mix.styles([
        bower + admin + 'bootstrap/css/bootstrap.min.css',
        bower + 'font-awesome/css/font-awesome.min.css',
        bower + 'sweetalert/dist/sweetalert.css',
        bower + 'jquery-ui/themes/base/jquery-ui.min.css',
        bower + admin + 'plugins/select2/select2.css',
        bower + admin + 'dist/css/AdminLTE.min.css',
        bower + admin + 'dist/css/skins/_all-skins.min.css',
        '../../../public/assets/backend/css/custom.css'
    ], 'public/assets/backend/css');

    mix.scripts([

        bower + admin + 'plugins/jQuery/jquery-2.2.3.min.js',
        bower + admin + 'bootstrap/js/bootstrap.min.js',
        bower + admin + 'plugins/slimScroll/jquery.slimscroll.min.js',
        bower + admin + 'plugins/fastclick/fastclick.js',
        bower + 'sweetalert/dist/sweetalert.min.js',
        bower + 'jquery-ui/jquery-ui.min.js',
        bower + admin + 'plugins/select2/select2.full.js',
        bower + admin + 'plugins/select2/i18n/pt-BR.js',
        bower + admin + 'dist/js/app.min.js',
        '../backend/js/custom.js'
    ], 'public/assets/backend/js');

    mix.copy('public/../bower_components/AdminLTE/bootstrap/fonts', 'public/assets/backend/fonts');
    mix.copy('public/../bower_components/font-awesome/fonts', 'public/assets/backend/fonts');

});
