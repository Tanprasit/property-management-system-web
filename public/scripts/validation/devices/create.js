$(document).ready(function() {

    $('#model').change(function() {
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

    $('#manufacturer').change(function() {
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

    $('#product').change(function() {
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

    $('#sdk_version').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidSdk( $( this ).val()) ) ? true : false;

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

    $('#serial_number').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidSerialNumber( $( this ).val()) ) ? true : false;

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


    $('#lat').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidLat( $( this ).val()) ) ? true : false;

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


    $('#long').change(function() {
        var len = $( this ).val().length;

        var valid = ( isValidLong( $( this ).val()) ) ? true : false;

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

function isValidLat(coordinate) {
    var regex = /^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/;
    return regex.test(Number(coordinate));
}

function isValidLong(coordinate) {
    var regex = /^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/;
    return regex.test(Number(coordinate));
}

function isValidSdk(version) {
    var regex = /^[1-9]\d{0,2}$/;
    return regex.test(version);
}

function isValidSerialNumber(serial) {
    var regex = /(?=^.{3,15}$)(?![_-].+)(?!.+[_-]$)(?!.*[_-]{2,})[^<>[\]{}|\\\/^~%# :;,$%?\0-\cZ]+$/;
    return regex.test(serial);
}