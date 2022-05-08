/**
 * Admin js archive.
 */

// No conflict with dolar simbol ("$");

$ = jQuery.noConflict();

$(document).ready(function() {

    $('#btn_crear').on('click', function() {
        var Modalpopup = new bootstrap.Modal(document.getElementById('Modalpopup'), {
            keyboard: false
        });
        Modalpopup.show();
    })

});

/* jQuery(function($){

}); */