# Add Bootstrap

## Installation

To be able to use Bootstrap in your project, you need to install it. In our case, we use the package manager **yarn**.

```sh
$ yarn add bootstrap --dev
```

## Importing Bootstrap Styles

Now that **bootstrap** lives in your **node_modules/** directory, you can import it from any Sass or Javascript file. For example, if you already have a **app.scss** file, import it from there:

    // assets/css/app.scss

    // customize some Bootstrap variables
    $primary: darken(#428bca, 20%);

    // the ~ allows you to reference things in node_modules
    @import "~bootstrap/scss/bootstrap";

## Importing Bootstrap JavaScript

### jQuery

Bootstrap JavaScript require jQuery, so make sure you have this installed:

```sh
$ yarn add jquery --dev
```

Next, make sure to call **.autoProvidejQuery()** in your **webpack.config.js** file:
    
    //webpack.config.js
    
    Encore
        // ...
        .autoProvidejQuery()
    ;

This is needed because Bootstrap expects jQuery to be available as a global variable. Now, require bootstrap from any of your JavaScript files:
    
    // app.js
    
    const $ = require('jquery');
    
    require('bootstrap');
    
    $(document).ready(function(){
       $('[data-toggle="popover"]').popover(); 
    });
    
### Popper

Bootstrap JavaScript require Popper, so make sure you have this installed:

```sh
$ yarn add popper.js --dev
```

Then update your **webpack.config.js** file with the following line:

    // webpack.config.js
    
    Encore
        // ...
        .autoProvideVariables({Popper :['popper.js', 'default']})
    ;

