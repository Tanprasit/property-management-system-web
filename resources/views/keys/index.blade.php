@extends('master')

@section('navigation')
    @include('nav.keys')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Keys</h1>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <b class="abc">KEYS LIST</h3>
          <div class="btn-group pull-right ">
              <a href="{{ URL::route('keys.create') }}" class="btn btn-primary ">Add Key</a>
          </div>
         </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="keys-table" class="display nowrap" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Taken</th>
                          <th>Returned</th>
                          <th>Pin</th>
                          <th>Property</th>
                          <th>Contractor</th>
                          <th>Options</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($keys as $key)
                      <tr class="clickable-row"  href="{{ URL::route('keys.show', [$key->id]) }}" onmouseover="this.style.cursor='pointer'">
                          <td>{{ $key->taken_at }}</td>
                          <td>{{ $key->returned_at }}</td>
                          <td>{{ $key->pin }}</td>
                          <td>{{ $key->property->address_line_1  }}</td>
                          <td>{{ $key->contractor->full_name }}</td>
                          <td>
                              <form method="POST" action="{{ URL::route('keys.destroy', [$key->id]) }}">
                                  {{ method_field('DELETE') }}
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a class="btn btn-primary" href="{{ URL::route('keys.edit', [$key->id] ) }}">Edit</a>
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

        $('#keys-table').DataTable( {
            "scrollX":true
        });
    } );
</script>
@stop