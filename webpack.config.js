var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning()

    // uncomment to define the assets of the project
    .addEntry('js/app', './assets/js/app.js')
    
    .addEntry('slide1', './assets/img/slide1.png')
    .addEntry('slide2', './assets/img/slide2.png')
    .addEntry('slide3', './assets/img/slide3.png')

    .addStyleEntry('scss/style', './assets/scss/style.scss')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    .autoProvidejQuery()

    // Popper
    .autoProvideVariables({Popper :['popper.js', 'default']})
;

module.exports = Encore.getWebpackConfig();
