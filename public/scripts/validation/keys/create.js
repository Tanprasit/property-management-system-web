$(document).ready(function() {

    $('#pin').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidPin( $( this ).val() ) ) ? true : false;

        if (len > 0 && valid == true) {
            $( this ).parents( '.input-container' ).addClass( 'has-success' );
            $( this ).siblings( '.glyphicon-ok' ).removeClass( 'hidden' );
            $( this ).parents( '.input-container' ).removeClass('has-error');
            $( this ).siblings( '.glyphicon-remove' ).addClass( 'hidden' );
        } else {
            $( this ).parents( '.input-container' ).addClass( 'has-error' );
            $( this ).siblings( '.glyphicon-remove' ).removeClass( 'hidden' );
            $( this ).parents( '.input-container' ).removeClass('has-success');
            $( this ).siblings( '.glyphicon-ok' ).addClass( 'hidden' );
        }
    });

    $('#taken-at').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidDateTime( $( this ).val() ) ) ? true : false ;

        if (len > 0 && valid == true) {
            $( this ).parents( '.input-container' ).addClass( 'has-success' );
            $( this ).siblings( '.glyphicon-ok' ).removeClass( 'hidden' );
            $( this ).parents( '.input-container' ).removeClass('has-error');
            $( this ).siblings( '.glyphicon-remove' ).addClass( 'hidden' );
        } else {
            $( this ).parents( '.input-container' ).addClass( 'has-error' );
            $( this ).siblings( '.glyphicon-remove' ).removeClass( 'hidden' );
            $( this ).parents( '.input-container' ).removeClass('has-success');
            $( this ).siblings( '.glyphicon-ok' ).addClass( 'hidden' );
        }
    });

    $('#returned-at').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidDateTime( $( this ).val() ) ) ? true : false ;

        if (len > 0 && valid == true) {
            $( this ).parents( '.input-container' ).addClass( 'has-success' );
            $( this ).siblings( '.glyphicon-ok' ).removeClass( 'hidden' );
            $( this ).parents( '.input-container' ).removeClass('has-error');
            $( this ).siblings( '.glyphicon-remove' ).addClass( 'hidden' );
        } else {
            $( this ).parents( '.input-container' ).addClass( 'has-error' );
            $( this ).siblings( '.glyphicon-remove' ).removeClass( 'hidden' );
            $( this ).parents( '.input-container' ).removeClass('has-success');
            $( this ).siblings( '.glyphicon-ok' ).addClass( 'hidden' );
        }
    });
});

// Is valid pin
function isValidPin(pin) {
    var regex = /^[0-9]+$/;
    return regex.test(pin);
}

function isValidDateTime(dateTime) {
    var regex = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/;
    return regex.test(dateTime);
}