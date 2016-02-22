@extends('master')

@section('navigation')
    @include('nav.notifications')
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <?php echo $notification->data ?>
</div>
@stop

@section('scripts')
<script src="/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('advertArea', {
    on: {
        save: function(evt)
        {
            // Do something here, for example:
            var message = CKEDITOR.instances.advertArea.getData();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            var type = 'adverts';
            var data = message;

            var dataString ='_token=' + CSRF_TOKEN + '&data=' + data +'&type=' + type;

            $.ajax({
                type: 'POST',
                url: '/notifications/',
                data: dataString,
                success: function(response) {
                } 
            }, "json");
 
            // If you want to prevent the form submit (if your editor is in a <form> element), return false here
            return false;
        }
    }
});
</script>
@stop