# Manage Your Assets With Encore

**Webpack Encore** is a simpler way to integrate **Webpack** into your application. It *wraps* Webpack, giving you a clean & powerful API for bundling JavaScript modules, pre-processing CSS & JS and compiling and minifying assets. Encore gives you professional asset system that's a *delight* to use.

## Encore Installation

First, make you sure you install Node.js and also the Yarn package manager.

Then, install Encore into your project with Yarn:

```sh
$ yarn add @symfony/webpack-encore --dev
```

## Configuring Encore/Webpack

Normally you have a file called **webpack.config.js** at the root of your project. If you don't, you need to create this file. Inside, use Encore to help generate your Webpack configuration :

    // webpack.config.js
    var Encore = require('@symfony/webpack-encore');

    Encore
        // the project directory where all compiled assets will be stored
        .setOutputPath('public/build/')

        // the public path used by the web server to access the previous directory
        .setPublicPath('/build')

        // will create public/build/app.js and public/build/app.scss
        .addEntry('app', './assets/js/app.js')
        .addStyleEntry('css/app', './assets/css/app.scss')

        // allow legacy applications to use $/jQuery as a global variable
        .autoProvidejQuery()

        // enable source maps during development
        .enableSourceMaps(!Encore.isProduction())

        // empty the outputPath dir before each build
        .cleanupOutputBeforeBuild()

        // show OS notifications when builds finish/fail
        .enableBuildNotifications()

        // create hashed filenames
        .enableVersioning()

        // allow sass/scss files to be processed
        .enableSassLoader()
    ;

    // export the final configuration
    module.exports = Encore.getWebpackConfig();


## Build The Assets

```sh
# compile assets once
$ yarn run encore dev

# recompile assets automatically when files change
$ yarn run encore dev --watch

# compile assets, but also minify & optimize them
$ yarn run encore production
```

## Using Sass 

In the previous configuration of the file called **webpack.config.js**, we allowed sass/scss files to be processed with the following line :
    
    // webpack.config.js
    Encore

        // ...

        // allow sass/scss files to be processed
        .enableSassLoader()
    ;

Using **enableSassLoader()** rquires to install additional packages, but Encore will tell you exactly which ones when running it. In my case :

```sh
$ yarn add sass-loader node-sass --dev
```