@extends('master')

@section('navigation')
    @include('nav.properties')
@stop

@section('content')
<div class="row">
    <h1 class="page-header">Edit Property 
        <a href="{{ URL::route('properties.show', $property->id) }}"></a>
    </h1>
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <b>Last Updated: {{ $property->getUpdatedAt() }}</b>
            <label class="btn btn-primary pull-right" for="form-submit">Submit</label>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ URL::route('properties.update', [$property->id]) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Address Line 1</label>
                    <div class="col-lg-6 input-container">
                        <input id="address_line_1" type="text" name="address_line_1" class="form-control" value="{{ $property->address_line_1 }}">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Address Line 2</label>
                    <div class="col-lg-6 input-container">
                        <input id="address_line_2" type="text" name="address_line_2" class="form-control" value="{{ $property->address_line_2 }}">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">City</label>
                    <div class="col-lg-6 input-container">
                        <input id="city" type="text" name="city" class="form-control" value="{{ $property->city }}" >
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">County</label>
                    <div class="col-lg-6 input-container">
                        <input id="county" type="text" name="county" class="form-control" value="{{ $property->county }}">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Postcode</label>
                    <div class="col-lg-6 input-container">
                        <input id="postcode" type="text" name="postcode" class="form-control" value="{{ $property->postcode }}">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <input id="form-submit" class="hidden" type="submit"/>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/scripts/validation/properties/edit.js"></script>
@stop