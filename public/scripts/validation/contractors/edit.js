$(document).ready(function() {

    $('#full_name').change(function() {
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

    $('#password').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidPassword( $( this ).val() ) ) ? true : false ;

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

    $('#email').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidEmail( $( this ).val() ) ) ? true : false ;

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

    $('#mobile').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidMobileNumber( $( this ).val() ) ) ? true : false ;

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

// Matches: 01222 555 555 | (010) 55555555 #2222 | 0122 555 5555#222
// UK phone number. Allows 3, 4 or 5 digit regional prefix
function isValidMobileNumber(number) {
    var regex = /^((\(?0\d{4}\)?\s?\d{3}\s?\d{3})|(\(?0\d{3}\)?\s?\d{3}\s?\d{4})|(\(?0\d{2}\)?\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;
    return regex.test(number);
}

function isValidEmail(email) {
    var regex =/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    return regex.test(email);
}

// Must be contain at least 8 characters, least 1 number and both lower and uppercase letters and special characters
function isValidPassword(password) {
    var regex = /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/;
    return !regex.test(password);
}