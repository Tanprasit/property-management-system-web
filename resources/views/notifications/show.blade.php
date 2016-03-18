@extends('master')

@section('navigation')
    @include('nav.notifications')
@stop

@section('content')
<h1 class="page-header">Notification Details</h1>
<div class="row">
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <b>Last Updated: {{ $notification->getUpdatedAt() }}</b>
                <a class="btn btn-primary pull-right" href="{{ URL::route('notifications.edit', $notification->id) }}">Edit</a>
            </div>
            <div class="panel-body">
                <div class="form-group col-lg-12">
                    <label>Title</label>
                    <input  id="title" class="form-control" type="text" name="title" class="form-control" value="{{ $notification->title }}" readonly="readlonly">
                </div>
                <div class="form-group col-lg-12">
                    <label>Type</label>
                    <input id="type" class="form-control" type="text" name="type" class="form-control" value="{{ $notification->type }}" readonly="readlonly">
                </div>
                <div class="form-group col-lg-12">
                    <label>Notes</label>
                    <textarea id="notes" class="form-control" readonly="readlonly">{{$notification->notes }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="panel panel-default notification-panel">
            <div class="panel-heading clearfix">
                <b>Notification Preview</b>
            </div>
            <div class="panel-body">
              <?php echo $notification->data ?>  
            </div>
        </div>
    </div>
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