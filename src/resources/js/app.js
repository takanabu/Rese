require('./bootstrap');

$(document).ready(function () {
    $('.menu-icon').click(function () {
        if (isLoggedIn) {
            window.location.href = '/menu/logout';
        } else {
            window.location.href = '/menu/login';
        }
    });
});