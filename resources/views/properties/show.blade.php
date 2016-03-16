@extends('master')

@section('navigation')
    @include('nav.properties')
@stop

@section('content')
<div class="row">
  <h1 class="page-header">Property Details</h1>
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
          <a class="btn btn-primary pull-right" href="{{ URL::route('properties.edit', $property->id) }}">Edit</a>
    </div>
    <div class="panel-body">
      <div class="col-lg-6">
          <div class="form-group col-lg-12">
              <label>Address Line 1</label>
              <input type="text" name="address_line_1" class="form-control" value="{{ $property->address_line_1 }}" readonly="readlonly">
          </div>

          <div class="form-group col-lg-12">
              <label>Address Line 2</label>
              <input type="text" name="address_line_2" class="form-control" value="{{ $property->address_line_2 }}" readonly="readlonly">
          </div>

          <div class="form-group col-lg-12">
              <label>City</label>
              <input type="text" name="city" class="form-control" value="{{ $property->city }}" readonly="readlonly">
          </div>

          <div class="form-group col-lg-12">
              <label>County</label>
              <input type="text" name="county" class="form-control" value="{{ $property->county }}" readonly="readlonly">
          </div>

          <div class="form-group col-lg-12">
              <label>Postcode</label>
              <input type="text" name="postcode" class="form-control" value="{{ $property->postcode }}" readonly="readlonly">
          </div>
      </div>
      <div class="col-lg-6">
        <div class="col-lg-12">
           <h2>Terms and Conditions</h2>
           <p>By clicking on "Register" you agree to The Company's' Terms and Conditions</p>

          <p>While rare, prices are subject to change based on exchange rate fluctuations - should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)</p>

           <p>Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)</p>

           <p>Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Second table for displaying all devices connected to current property -->
<div class="row">
        <h2 class="page-header">Connected Devices</h2>
        <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <div class="btn-group pull-right ">
              <button class="btn btn-primary" data-target="#addDeviceModal"  data-toggle="modal">Add Device</button>
          </div>
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
                                    <button class="btn btn-danger" type="submit">Remove</button>
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

<!-- Modal -->
<div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Device</h4>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/properties/{{ $property->id }}/addDevice" method="POST">
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
    } );
</script>
@stop