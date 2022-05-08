/**
 * Admin js archive.
 */

// No conflict with dolar simbol ("$");
$ = jQuery.noConflict();

// Global varibles.
var modalNombre;
var modalId;
var popupNombre;
var popupId;

// jQuery fuction.
$(document).ready(function() {

    $('#btn_crear').on('click', function() {
        var Modalpopup = new bootstrap.Modal(document.getElementById('Modalpopup'), {
            keyboard: false
        });
        Modalpopup.show();
    })

});

// Button save pop-up.
$(document).ready(function() {

    $('.modalData #btnGuardar').on('click', function() {
        modalNombre = $('.modalData #btnGuardar').val();
        modalId = Match.floor(Match.ramdom() * 100 );
    })

});










/* jQuery(function($){

}); */