$(document).ready(function() {

    $('#address_line_1').change(function() {
        var len = $( this ).val().length;
        if (len > 0) {
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

    $('#address_line_2').change(function() {
        var len = $( this ).val().length;
        if (len > 0) {
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

    $('#city').change(function() {
        var len = $( this ).val().length;
        if (len > 0) {
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

    $('#postcode').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidPostcode( $( this ).val()) ) ? true : false;

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

function isValidPostcode(postcode) {
     var postcodeRegEx = /[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}/; 
    return postcodeRegEx.test(postcode);
}