var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
    mix.version(["css/app.css", "js/app.js"]);
    mix.scripts(['jquery.js', 'bootstrap.js', 'moment.js', 'bootstrap-datetimepicker.js', 'summernote.js'], 'public/js/app.js');
});
