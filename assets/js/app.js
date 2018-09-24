// assets/js/app.js

const $ = require('jquery');

require('bootstrap');

require('../scss/style.scss');

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});


let Routing = require('../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router');
let Routes = //
console.log(Routing);