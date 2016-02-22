$('document').ready(function() {
    function save( event ) {
        event.preventDefault();
        
        var message = CKEDITOR.instances.advertArea.getData();

        var type = 'adverts';
        var data = message;

        var dataString = data +'$type=' + type;

        $.ajax({
            type: ':POST',
            url: 'notifications',
            data: dataString,
            success: function(data) {
                console.log(data)
            } 
        }, "json");
    }
});

