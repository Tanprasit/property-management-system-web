@extends('master')

@section('navigation')
    @include('nav.devices')
@stop

@section('content')
<div class="row">
    <h1 class="page-header">Device Details</h1>
    <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <label>Model</label>
                <input type="text" name="model" class="form-control" value="{{ $device->model }}" readonly="readonly">
            </div>

            <div class="form-group col-lg-12">
                <label>Manufactorer</label>
                <input type="text" name="manufactorer" class="form-control" value="{{ $device->manufactorer }}" readonly="readonly">
            </div>

            <div class="form-group col-lg-12">
                <label>Product</label>
                <input type="text" name="product" class="form-control" value="{{ $device->product }}" readonly="readonly">
            </div>

            <div class="form-group col-lg-12">
                <label>SDK Version</label>
                <input type="text" name="sdk_version" class="form-control" value="{{ $device->sdk_version }}" readonly="readonly">
            </div>

            <div class="form-group col-lg-12">
                <label>Serial Number</label>
                <input type="text" name="serial_number" class="form-control" value="{{ $device->serial_number }}" readonly="readonly">
            </div>
    </div>
    <div class="col-lg-6">
        <h2>Terms and Conditions</h2>
        <p>By clicking on "Register" you agree to The Company's' Terms and Conditions</p>

       <p>While rare, prices are subject to change based on exchange rate fluctuations - should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)</p>

        <p>Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)</p>

        <p>Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)</p>
    </div>
</div>

<div class="row">
    <!-- Second table for displaying all notifications connected to current device -->
      <h2 class=" ">Connected Notifications</h2>
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
              <div class="panel-heading clearfix">
                <div class="btn-group pull-right ">
                    <button class="btn btn-primary" data-target="#addDeviceModal"  data-toggle="modal">Add Notififcation</button>
                </div>
               </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table id="devices-table" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Notes</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($device->notifications as $notification)
                            <tr class="clickable-row"  href="{{ URL::route('devices.show', [$device->id]) }}" onmouseover="this.style.cursor='pointer'">
                                <td>{{ $notification->title }}</td>
                                <td>{{ $notification->type }}</td>
                                <td>{{ $notification->notes }}</td>
                                <td>
                                    <form method="POST" action="/devices/{{ $device->id }}/removeNotification">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="notification_id" value="{{ $notification->id }}"></input>
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
      </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Notification</h4>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/devices/{{ $device->id }}/addNotification" method="POST">
            {!! csrf_field() !!}
            <select class="form-control" name="notification_id">
            @foreach ($notifications as $notifcation)
                <option value="{{ $notifcation->id }}">{{ $notifcation->title }}</option>
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