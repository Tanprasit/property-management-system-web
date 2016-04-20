@extends('master')

@section('navigation')
    @include('nav.keys')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
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
      
      <!-- Key Information -->
      <div class="panel-body">
        <form class="form-horizontal">
          <div class="form-group">
              <label class="col-lg-4 control-label">Property</label>
              <div class="col-lg-6">
                <input id="device" type="text" name="model" class="form-control" value="{{ $key->property->address_line_1 }}" readonly="readonly">
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
</div>

<h1 class="page-header">Connected Contractor</h1>
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <b class="pull-left">Last Updated: {{ $key->contractor->getUpdatedAt() }}</b>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a class="btn btn-primary pull-right" href="{{ URL::route('contractors.edit', $key->contractor->id) }}">Edit</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-4 control-label">Full Name</label>
                <div class="col-lg-6">
                    <input type="text" name="full_name" class="form-control" value="{{ $key->contractor->full_name }}" readonly="readlonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label">Email</label>
                <div class="col-lg-6">
                    <input type="text" name="email" class="form-control" value="{{ $key->contractor->email }}" readonly="readlonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label">Mobile</label>
                <div class="col-lg-6">
                    <input type="text" name="mobile" class="form-control" value="{{ $key->contractor->mobile }}" readonly="readlonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label">Role</label>
                <div class="col-lg-6">
                    <input type="text" name="status" class="form-control" value="{{ $key->contractor->status }}" readonly="readlonly">
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
<script type="text/javascript">
    $(document).ready(function() {
        // Add links to individual key pages.
        $('.clickable-row').click(function() {
          window.document.location = $(this).attr("href");
        });

        $('#contractors-table').DataTable( {
            "scrollX":true
        });
    } );
</script>
 @stop