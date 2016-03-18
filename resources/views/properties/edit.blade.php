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
                <div class="form-group">
                    <label class="col-lg-4 control-label">Address Line 1</label>
                    <div class="col-lg-6">
                        <input type="text" name="address_line_1" class="form-control" value="{{ $property->address_line_1 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Address Line 2</label>
                    <div class="col-lg-6">
                        <input type="text" name="address_line_2" class="form-control" value="{{ $property->address_line_2 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">City</label>
                    <div class="col-lg-6">
                        <input type="text" name="city" class="form-control" value="{{ $property->city }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">County</label>
                    <div class="col-lg-6">
                        <input type="text" name="county" class="form-control" value="{{ $property->county }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Postcode</label>
                    <div class="col-lg-6">
                        <input type="text" name="postcode" class="form-control" value="{{ $property->postcode }}">
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