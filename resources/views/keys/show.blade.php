@extends('master')

@section('navigation')
    @include('nav.keys')
@stop

@section('content')
<div class="row">
    <h1 class="page-header">Key Details</h1>
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <b class="pull-left">Last Updated: {{ $key->getUpdatedAt() }}</b>
        <form class="btn-toolbar pull-right" method="POST" action="{{ URL::route('keys.destroy', [$key->id]) }}">
            {{ method_field('DELETE') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger pull-right" type="submit">Delete</button>
            <a class="btn btn-primary pull-right" href="{{ URL::route('keys.edit', $key->id) }}">Edit</a>
        </form>
      </div>
      <div class="panel-body">
      <!-- Device Information -->
        <form class="form-horizontal">
          <div class="form-group">
              <label class="col-lg-4 control-label">Property</label>
              <div class="col-lg-6">
                <input id="device" type="text" name="model" class="form-control" value="{{ $key->property->address_line_1 }}" readonly="readonly">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-4 control-label">Contractor</label>
              <div class="col-lg-6">
                <input type="text" name="manufacturer" class="form-control" value="{{ $key->contractor->full_name }}" readonly="readonly">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-4 control-label">Pin</label>
              <div class="col-lg-6">
                <input type="text" name="product" class="form-control" value="{{ $key->pin }}" readonly="readonly">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-4 control-label">Taken</label>
              <div class="col-lg-6">
                <input type="text" name="sdk_version" class="form-control" value="{{ $key->taken_at }}" readonly="readonly">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-4 control-label">Returned</label>
              <div class="col-lg-6">
                <input type="text" name="serial_number" class="form-control" value="{{ $key->returned_at }}" readonly="readonly">
              </div>
          </div>
      </div>
    </form>
  </div>
</div>
@stop

 @section('css')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
 @stop

<!-- Prevents API requests to Google if lat long is null -->
 @section('scripts')
<script type="text/javascript" src="/lib/datatables.min.js"></script>
 @stop