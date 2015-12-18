var elixir = require('laravel-elixir');

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

    mix.sass([
        'app.scss'
        ], 'public/css/app.css');

    // mix.styles([
    //     'bootstrap.min.css',
    //     'select2.css',
    //     'select2-bootstrap.css',
    // ], 'public/all.css', 'public/css');

    // mix.scripts([
    //     'jquery-1.11.3.min.js',
    //     'bootstrap.min.js',
    //     'select2.min.js',
    //     'myscripts.js'
    // ], 'public/finaljs/all.js', 'public/js');

});
