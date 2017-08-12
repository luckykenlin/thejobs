const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.autoload({});

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
// data
mix.react("resources/assets/administrator/user/list.js", "public/administrator/user/list.js");
mix.react("resources/assets/administrator/job/list.js", "public/administrator/job/list.js");
mix.react("resources/assets/administrator/role/list.js", "public/administrator/role/list.js");

mix.js('resources/assets/js/sweetswal.js', 'public/js');
mix.js('resources/assets/administrator/usermanage/customloader.js', 'public/js');
mix.js('resources/assets/administrator/usermanage/dataUtility.js', 'public/js');