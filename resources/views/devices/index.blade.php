@extends('master')

@section('navigation')
    @include('nav.devices')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Devices</h1>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <b class="abc">Device List</h3>
          <div class="btn-group pull-right ">
              <a href="{{ URL::route('devices.create') }}" class="btn btn-primary ">Add Device</a>
          </div>
         </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="devices-table" class="display nowrap" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Model</th>
                          <th>manufacturer</th>
                          <th>Product</th>
                          <th>SDK Version</th>
                          <th>Serial Number</th>
                          <th>Options</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($devices as $device)
                      <tr class="clickable-row"  href="{{ URL::route('devices.show', [$device->id]) }}" onmouseover="this.style.cursor='pointer'">
                          <td>{{ $device->model }}</td>
                          <td>{{ $device->manufacturer }}</td>
                          <td>{{ $device->product }}</td>
                          <td>{{ $device->sdk_version }}</td>
                          <td>{{ $device->serial_number }}</td>
                          <td>
                              <form method="POST" action="{{ URL::route('devices.destroy', [$device->id]) }}">
                                  {{ method_field('DELETE') }}
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a class="btn btn-primary" href="{{ URL::route('devices.edit', [$device->id] ) }}">Edit</a>
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