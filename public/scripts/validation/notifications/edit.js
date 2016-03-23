$(document).ready(function() {

    $('#title').change(function() {
        var len = $( this ).val().length;

        if (len > 1) {
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


    $('#type').change(function() {
        var len = $( this ).val().length;

        if (len > 1) {
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


    $('#notes').change(function() {
        var len = $( this ).val().length;

        if (len > 1) {
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
