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
                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Model</label>
                    <div class="col-lg-6 input-container">
                        <input id="model" type="text" name="model" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Manufacturer</label>
                    <div class="col-lg-6 input-container">
                        <input id="manufacturer" type="text" name="manufacturer" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Product</label>
                    <div class="col-lg-6 input-container">
                        <input id="product" type="text" name="product" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">SDK Version</label>
                    <div class="col-lg-6 input-container">
                        <input id="sdk_version"  type="text" name="sdk_version" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Serial Number</label>
                    <div class="col-lg-6 input-container">
                        <input id="serial_number" type="text" name="serial_number" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <hr class="row">

                  <div class="form-group has-feedback">
                      <label class="col-lg-4 control-label">Latitude</label>
                      <div class="col-lg-6 input-container">
                        <input id="lat" type="text" name="latitude" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                      </div>
                  </div>

                  <div class="form-group has-feedback">
                      <label class="col-lg-4 control-label">Longitude</label>
                      <div class="col-lg-6 input-container">
                        <input id="long" type="text" name="longitude" class="form-control" value="">
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

@section('scripts')
<script type="text/javascript" src="/scripts/validation/devices/create.js"></script>
@stop