@extends('master')

@section('navigation')
    @include('nav.keys')
@stop

@section('content')
<div class="row">
    <h1 class="page-header">Create Key</h1>
    <div class="panel panel-default">    
        <div class="panel-heading clearfix">
            <b>KEY INFORMATION</b>
            <label for="form-submit" class="btn btn-primary pull-right">Submit</label>
        </div>
        <div class="panel-body">        
            <form class="form-horizontal" method="POST" action="/keys" autocomplete="off">
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Property</label>
                    <div class="col-lg-6 input-container">
                        <select id="property-id" class="form-control" name="property_id">
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->address_line_1 }}</option>
                        @endforeach
                        </select>
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Contractor</label>
                    <div class="col-lg-6 input-container">
                        <select id="user-id" class="form-control" name="user_id">
                        @foreach ($contractors as $contractor)
                            <option value="{{ $contractor->id }}">{{ $contractor->full_name }}</option>
                        @endforeach
                        </select>
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Pin</label>
                    <div class="col-lg-6 input-container">
                        <input id="pin" type="text" name="pin" class="form-control" value="{{ old('pin') }}">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>
                
                <hr class="row">

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Taken</label>
                    <div class="col-lg-6 input-container" id='datetimepicker1'>
                        <div class="input-group date form_datetime">
                            <input id="taken-at" type="text" name="taken_at" class="form-control" size="16" value="{{ old('taken_at') }}">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Returned</label>
                    <div class="col-lg-6 input-container" id='datetimepicker2'>
                       <div class="input-group date form_datetime">
                           <input id="returned-at" type="text" name="returned_at" class="form-control" size="16" value="{{ old('returned_at') }}">
                           <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                       </div>
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <button id="form-submit" class="hidden" type="submit"/>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="/lib/datetimepicker/css/bootstrap-datetimepicker.min.css">
@stop

@section('scripts')
<script type="text/javascript" src="/scripts/validation/keys/create.js"></script>
<script type="text/javascript" src="/lib/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
</script>   
@stop