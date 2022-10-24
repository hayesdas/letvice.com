try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('@popperjs/core');
    window.bootstrap = require('bootstrap');
} catch (e) {}
$(document).ready(function () {
    $('.logo').click(function () {
        location.href = '/'
    });
});
