@extends('master')

@section('navigation')
    @include('nav.devices')
@stop

@section('content')
<div class="row">
    <h1 class="page-header">Create Device</h1>
    <div class="panel panel-default">    
        <div class="panel-heading clearfix">
            <b>DEVICE INFORMATION</b>
            <label for="form-submit" class="btn btn-primary pull-right">Submit</label>
        </div>
        <div class="panel-body">        
            <form class="form-horizontal" method="POST" action="/devices" autocomplete="off">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-lg-4 control-label">Model</label>
                    <div class="col-lg-6">
                        <input type="text" name="model" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">manufacturer</label>
                    <div class="col-lg-6">
                        <input type="text" name="manufacturer" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Product</label>
                    <div class="col-lg-6">
                        <input type="text" name="product" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">SDK Version</label>
                    <div class="col-lg-6">
                        <input type="text" name="sdk_version" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Serial Number</label>
                    <div class="col-lg-6">
                        <input type="text" name="serial_number" class="form-control" value="">
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