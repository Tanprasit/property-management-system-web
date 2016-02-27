@extends('master')

@section('navigation')
    @include('nav.contractors')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contractors</h1>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading clearfix">
           <b>Contractors List</b>
             <div class="btn-group pull-right">
              <a href="{{ URL::route('contractors.create') }}" class="btn btn-primary ">Add Contractor</a>
            </div>
         </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="devices-table" class="display nowrap" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Role</th>
                          <th>Options</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($contractors as $contractor)
                    <tr class="clickable-row" href="{{ URL::route('contractors.show', [$contractor->id]) }}" onmouseover="this.style.cursor='pointer'">
                      <td>{{ $contractor->full_name }}</td>
                      <td>{{ $contractor->email }}</td>
                      <td>{{ $contractor->mobile }}</td>
                      <td>{{ $contractor->status }}</td>
                      <td>
                          <form method="POST" action="{{ URL::route('contractors.destroy', [$contractor->id]) }}">
                              {{ method_field('DELETE') }}
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <a class="btn btn-primary" href="{{ URL::route('contractors.edit', [$contractor->id] ) }}">Edit</a>
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
      // Add links to each contractor details page.
      $('.clickable-row').click(function() {
        window.document.location = $(this).attr("href");
      });

      $('#devices-table').DataTable( {
        "scrollX":true
      } );
    } );
</script>
@stop