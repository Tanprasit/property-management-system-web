@extends('master')

@section('navigation')
    @include('nav.notifications')
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Create Notification</h1>
    <div class="row">
        <div class="col-lg-6">
            <form>
                <div class="form-group col-lg-12">
                    <label>Title</label>
                    <input  id="title" class="form-control" type="text" name="title" class="form-control" value="">
                </div>
                <div class="form-group col-lg-12">
                    <label>Type</label>
                    <input id="type" class="form-control" type="text" name="type" class="form-control" value="">
                </div>
                <div class="form-group col-lg-12">
                    <label>Notes</label>
                    <textarea id="notes" class="form-control"></textarea>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <p>Please provide the notification title, type and notes to the left. They will be submitted along with the notification data below</p>
            <p>You can modify the look of a single notification page. You can add images via URIs and once you satified with the content hit the 'save button'</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form>
                <textarea name="advertArea" id="advertArea" rows="10" cols="80">
                    This is my textarea to be replaced with CKEditor.
                </textarea>
            </form>
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
            var content = CKEDITOR.instances.advertArea.getData();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            // Grab notification meta data.
            var type = $('#type').val();
            var title = $('#title').val();
            var notes = $('#notes').val();
            var data = encodeURIComponent(content);

            // Encode the data before ajax request. Otherwise, we will get multiple request headers.
            var dataString ='_token=' + CSRF_TOKEN + '&data=' + data +'&type=' + type;

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
@stop