const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/js/app.js', '/js/notifications')
    .js(__dirname + '/Resources/js/notify.js', '/js/notifications')
    .sass(__dirname + '/Resources/sass/notify.scss', '/css/notifications')
    .sass(__dirname + '/Resources/sass/app.scss', '/css/notifications');

if (mix.inProduction()) {
    mix.version();
}
