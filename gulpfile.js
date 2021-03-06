const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */
// Elixir.webpack.mergeConfig({
//     resolve: {
//         alias: {
//           'vue$': 'node_modules/vue/dist/vue.esm.js'
//         }
//       }
// });

elixir((mix) => {
    //mix.sass('app.scss')
    mix.webpack('app.js');
    //mix.rollup('app.js');
    //mix.copy('node_modules/element-ui/packages/theme-chalk/src/fonts/', 'public/fonts/');
});
