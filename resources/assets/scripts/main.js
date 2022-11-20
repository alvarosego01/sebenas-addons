

jQuery.noConflict()


console.log('pruebas');
function lightboxes2_settings() {

    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'alwaysShowNavOnTouchDevices': true,
        'positionFromTop': 100
        // 'disableScrolling': true
    })

}





jQuery(document).ready(function () {

    lightboxes2_settings();

});


