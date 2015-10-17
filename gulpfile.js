var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.sass(["app.scss"], 'public/css/')
        .scripts([
        	'Sortable-master/Sortable.js',
            'main.js'

        ])
        .version(["public/css/app.css", "public/js/all.js"]);
});