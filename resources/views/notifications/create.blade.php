@extends('master')

@section('navigation')
    @include('nav.notifications')
@stop

@section('content')
<h1 class="page-header">Create Notification</h1>
<div class="row">
    <div class="col-lg-12">    
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <b>Notification Details</b>
            </div>
            <div class="panel-body">
                    <form class="form-horizontal" autocomplete="off">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="form-group has-feedback">
                            <label class="col-lg-4 control-label">Title</label>
                            <div class="col-lg-6 input-container">
                                <input  id="title" class="form-control" type="text" name="title" class="form-control" value="">
                                <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="col-lg-4 control-label">Type</label>
                            <div class="col-lg-6 input-container">
                                <input id="type" class="form-control" type="text" name="type" class="form-control" value="">
                                <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Notes</label>
                            <div class="col-lg-6 input-container">
                                <textarea id="notes" class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 text-center">
        <form>
            <textarea name="notificationArea" id="notificationArea" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
        </form>
    </div>
</div>
@stop

@section('scripts')
<script src="/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('notificationArea', {
    on: {
        save: function(evt)
        {
            // Do something here, for example:
            var content = CKEDITOR.instances.notificationArea.getData();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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
                type: 'POST',
                url: '/notifications/',
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
<script type="text/javascript" src="/scripts/validation/notifications/create.js"></script>
@stop