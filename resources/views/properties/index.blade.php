@extends('master')

@section('navigation')
    @include('nav.properties')
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Property List</h1>
  <div class="table-responsive">
    <table id="properties-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Address Line 1</th>
                <th>Address Line 2</th>
                <th>City</th>
                <th>County</th>
                <th>Postcode</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($properties as $property)
            <tr class="clickable-row" href="{{ URL::route('properties.show', [$property->id]) }}" onmouseover="this.style.cursor='pointer'" >
                <td>{{ $property->address_line_1 }}</td>
                <td>{{ $property->address_line_2 }}</td>
                <td>{{ $property->city }}</td>
                <td>{{ $property->county }}</td>
                <td>{{ $property->postcode }}</td>
                <td>
                    <form method="POST" action="{{ URL::route('properties.destroy', [$property->id]) }}">
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn btn-primary" href="{{ URL::route('properties.edit', [$property->id] ) }}">Edit</a>
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
        // Add links to each property details page.
        $('.clickable-row').click(function() {
          window.document.location = $(this).attr("href");
        });

        $('#properties-table').DataTable( {
            createdRow: function ( row ) {
                $('td', row).attr('tabindex', 0);
            }
        } );
    } );
</script>
@stop