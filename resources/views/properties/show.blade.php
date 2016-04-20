@extends('master')

@section('navigation')
    @include('nav.properties')
@stop

@section('content')
<div class="row">
  <h1 class="page-header">Property Details</h1>
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
          <b>Last Updated: {{ $property->getUpdatedAt() }}</b>
          <form class="btn-toolbar pull-right" method="POST" action="{{ URL::route('properties.destroy', [$property->id]) }}">
              {{ method_field('DELETE') }}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button class="btn btn-danger pull-right" type="submit">Delete</button>
              <a class="btn btn-primary pull-right" href="{{ URL::route('properties.edit', $property->id) }}">Edit</a>
          </form>
    </div>
    <div class="panel-body">
      <form class="form-horizontal">
          <div class="form-group">
              <label class="col-lg-4 control-label">Address Line 1</label>
              <div class="col-lg-6">
                <input type="text" name="address_line_1" class="form-control" value="{{ $property->address_line_1 }}" readonly="readlonly">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-4 control-label">Address Line 2</label>
              <div class="col-lg-6">
                <input type="text" name="address_line_2" class="form-control" value="{{ $property->address_line_2 }}" readonly="readlonly">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-4 control-label">City</label>
              <div class="col-lg-6">
                <input type="text" name="city" class="form-control" value="{{ $property->city }}" readonly="readlonly">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-4 control-label">County</label>
              <div class="col-lg-6">
                <input type="text" name="county" class="form-control" value="{{ $property->county }}" readonly="readlonly">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-4 control-label">Postcode</label>
              <div class="col-lg-6">
                <input type="text" name="postcode" class="form-control" value="{{ $property->postcode }}" readonly="readlonly">
              </div>
          </div>
      </form>
    </div>
  </div>
</div>

<br/>

<!-- Second table for displaying all devices connected to current property -->
<div class="row">
  <h2 class="page-header">Connected Devices</h2>
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <b class="pull-left">DEVICE LIST</b>
      <button class="btn btn-primary pull-right" data-target="#addDeviceModal"  data-toggle="modal">Add Device</button>
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    <table id="devices-table" class="display nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Model</th>
          <th>Manufactorer</th>
          <th>Product</th>
          <th>SDK Version</th>
          <th>Serial Number</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($property->devices as $device)
        <tr class="clickable-row"  href="{{ URL::route('devices.show', [$device->id]) }}" onmouseover="this.style.cursor='pointer'">
          <td>{{ $device->model }}</td>
          <td>{{ $device->manufactorer }}</td>
          <td>{{ $device->product }}</td>
          <td>{{ $device->sdk_version }}</td>
          <td>{{ $device->serial_number }}</td>
          <td>
          <form method="POST" action="/properties/{{ $property->id }}/removeDevice">
            <input type="hidden" name="device_id" value="{{ $device->id }}"></input>
            {!! csrf_field() !!}
            <a class="btn btn-primary" href="{{ URL::route('devices.edit', $device->id) }}">Edit</a>
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>

<br/>

<!-- Third table for displaying authorized contractors -->
<div class="row">
  <h2 class="page-header">Authorized Contractors</h2>
  <div class="panel panel-default">
  <div class="panel-heading clearfix">
     <b>CONTRACTOR LIST</b>
       <div class="btn-group pull-right">
      <button class="btn btn-primary pull-right" data-target="#addContractorModal"  data-toggle="modal">Add Contractor</button>
      </div>
   </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table id="contractors-table" class="display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th rowspan="2">Role</th>
                  <th rowspan="2">Contractor</th>
                  <th colspan="2">Key</th>
              </tr>
                <tr>
                    <th>Taken</th>
                    <th>Returned</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($property->keys as $key)
              <tr class="clickable-row" href="{{ URL::route('contractors.show', [$key->contractor->id]) }}" onmouseover="this.style.cursor='pointer'">
                <td>{{ $key->contractor->status }}</td>
                <td>{{ $key->contractor->full_name }}</td>
                <td>{{ $key->taken_at }}</td>
                <td>{{ $key->returned_at }}</td>
                <td>
                    <form method="POST" action="/property/{{ $key->id }}/removeContractor">
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn btn-primary" href="{{ URL::route('contractors.edit', [$key->contractor->id] ) }}">Edit</a>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal for adding new devices -->
<div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Device</h4>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/property/{{ $property->id }}/addDevice" method="POST">
            {!! csrf_field() !!}
            <select class="form-control" name="device_id">
            @foreach ($devices as $device)
                <option value="{{ $device->id }}">{{ $device->serial_number }}</option>
            @endforeach
            </select>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
       </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for authorizing new contractors -->
<div class="modal fade" id="addContractorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Contractor</h4>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/property/{{ $property->id }}/addContractor" method="POST" autocomplete="off">
            {!! csrf_field() !!}
            <div class="form-group">
                <label>Contractor</label>
                <select class="form-control" name="contractor_id">
                @foreach ($contractors as $contractor)
                    <option value="{{ $contractor->id }}">{{ $contractor->full_name }}</option>
                @endforeach
                </select>
                <br/>
                <label>Pin</label>
                <input  type="text" class="form-control" name="pin"></input>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
       </form>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
@stop

@section('scripts')
<script type="text/javascript" src="/lib/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Add links to each devices details page.
        $('.clickable-row').click(function() {
          window.document.location = $(this).attr("href");
        });

        $('#devices-table').DataTable( {
            "scrollX":true
        });

        $('#contractors-table').DataTable( {
            "scrollX":true
        });
    } );
</script>
@stop