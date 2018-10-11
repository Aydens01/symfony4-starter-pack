// assets/js/app.js

const $ = require('jquery');

require('bootstrap');

require('../scss/style.scss');

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

// AJAX With Symfony (example)

let Routing = require('../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router');
let Routes = require('./js_routes.json');

Routing.setRoutingData(Routes);

// User id load
let user_id = document.getElementById('user3').dataset.userId;

let url = Routing.generate('adminUserShow', {id:user_id});
console.log(url);

document.addEventListener('DOMContentLoaded', function (event){
    
})
