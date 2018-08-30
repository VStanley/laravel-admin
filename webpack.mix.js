let mix = require('laravel-mix');

module.exports = {
    mode: 'production'
};

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

// admin
mix.styles([
    'resources/assets/admin/css/icomoon.css',
    'resources/assets/admin/css/bootstrap.min.css',
    'resources/assets/admin/css/core.css',
    'resources/assets/admin/css/components.css',
    'resources/assets/admin/css/colors.css'
], 'public/admin/css/adminStyle.css');

mix.scripts([
    'resources/assets/admin/js/plugins/loaders/pace.min.js',
    'resources/assets/admin/js/jquery.min.js',
    'resources/assets/admin/js/bootstrap.min.js',
    'resources/assets/admin/js/plugins/loaders/blockui.min.js'
], 'public/admin/js/adminCore.min.js');

mix.copy([
    'resources/assets/admin/js/app.min.js'
], 'public/admin/js/app.min.js');

mix.scripts([
    'resources/assets/admin/js/plugins/summernote/summernote.min.js',
    'resources/assets/admin/js/plugins/summernote/summernote-ru-RU.js'
], 'public/admin/js/summernote.min.js');

mix.copy([
    'resources/assets/admin/js/plugins/forms/styling/switchery.min.js'
], 'public/admin/js/switchery.min.js');

mix.copy([
    'resources/assets/admin/js/plugins/forms/styling/uniform.min.js'
], 'public/admin/js/uniform.min.js');

mix.copy([
    'resources/assets/admin/js/plugins/uploaders/dropzone.min.js'
], 'public/admin/js/dropzone.min.js');

mix.scripts([
    'resources/assets/admin/js/plugins/trees/fancytree_all.min.js',
    'resources/assets/admin/js/plugins/trees/fancytree_childcounter.js',
], 'public/admin/js/fancytree.js');

mix.scripts([
    'resources/assets/admin/js/pages/extra_trees.js'
], 'public/admin/js/extra_trees.js');

mix.scripts([
    'resources/assets/admin/js/libraries/jquery_ui/effects.min.js',
    'resources/assets/admin/js/libraries/jquery_ui/interactions.min.js'
], 'public/admin/js/jquery_ui.js');

mix.copy([
    'resources/assets/admin/js/plugins/forms/selects/select2.min.js'
], 'public/admin/js/select2.min.js');

mix.copy([
    'resources/assets/admin/js/plugins/notifications/pnotify.min.js'
], 'public/admin/js/pnotify.min.js');