// assets/js/app.js

const $ = require('jquery');

require('bootstrap');

require('../scss/style.scss');

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
