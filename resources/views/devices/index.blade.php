@extends('master')

@section('navigation')
    @include('nav.devices')
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Device List</h1>
  <div class="table-responsive">
    <table id="devices-table" class="display" cellspacing="0" width="100%">
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
        @foreach ($devices as $device)
            <tr class="clickable-row"  href="{{ URL::route('devices.show', [$device->id]) }}" onmouseover="this.style.cursor='pointer'">
                <td>{{ $device->model }}</td>
                <td>{{ $device->manufactorer }}</td>
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
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
@stop


@section('scripts')
<script type="text/javascript" src="lib/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Add links to each devices details page.
        $('.clickable-row').click(function() {
          window.document.location = $(this).attr("href");
        });

        $('#devices-table').DataTable( {
            createdRow: function ( row ) {
                $('td', row).attr('tabindex', 0);
            }
        } );
    } );
</script>
@stop