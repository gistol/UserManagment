var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build/')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .addEntry('main', './assets/main.js')
    .enableSassLoader()
    .enableVueLoader()
;

module.exports = Encore.getWebpackConfig();
