@extends('master')

@section('navigation')
    @include('nav.notifications')
@stop

@section('content')
<h1 class="page-header">Edit Notification / <a href="{{ URL::route('notifications.show', [$notification->id]) }}">{{ $notification->id }}</a></h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <b>Last Updated: {{ $notification->getUpdatedAt() }}</b>
                
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <meta name="notification-id" content="{{ $notification->id }}">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Title</label>
                        <div class="col-lg-6">
                            <input  id="title" class="form-control" type="text" name="title" class="form-control" value="{{ $notification->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Type</label>
                        <div class="col-lg-6">
                            <input id="type" class="form-control" type="text" name="type" class="form-control" value="{{ $notification->type }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Notes</label>
                        <div class="col-lg-6">
                            <textarea id="notes" class="form-control">{{ $notification->notes }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <form>
            <textarea name="advertArea" id="advertArea" rows="10" cols="80">
                <?php echo htmlspecialchars($notification->data) ?>
            </textarea>
        </form>
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
            var content = CKEDITOR.instances.advertArea.getData();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var notificationID = $('meta[name="notification-id"]').attr('content');

            // Grab notification meta data.
            var type = $('#type').val();
            var title = $('#title').val();
            var notes = $('#notes').val();
            var data = encodeURIComponent(content);

            // Encode the data before ajax request. Otherwise, we will get multiple request headers.
            var dataString = 
                '_token=' + CSRF_TOKEN + 
                '&data=' + data + 
                '&type=' + type + 
                '&title=' + title + 
                '&notes=' + notes;

            $.ajax({
                type: 'PUT',
                url: '/notifications/' + notificationID,
                data: dataString
            }, "json").done(function (response) {
                window.location.replace(response.redirectURL);
            });
 
            // If you want to prevent the form submit (if your editor is in a <form> element), return false here
            return false;
        }
    }
});
</script>
@stop