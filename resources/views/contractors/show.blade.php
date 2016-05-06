@extends('master')

@section('navigation')
    @include('nav.contractors')
@stop

@section('content')
<h1 class="page-header">Contractor Details</h1>
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <b class="pull-left">Last Updated: {{ $contractor->getUpdatedAt() }}</b>
        <form class="btn-toolbar pull-right" method="POST" action="{{ URL::route('contractors.destroy', [$contractor->id]) }}">
            {{ method_field('DELETE') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger pull-right" type="submit">Delete</button>
            <a class="btn btn-primary pull-right" href="{{ URL::route('contractors.edit', $contractor->id) }}">Edit</a>
        </form>
    </div>
    <div class="panel-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-4 control-label">Full Name</label>
                <div class="col-lg-6">
                    <input type="text" name="full_name" class="form-control" value="{{ $contractor->full_name }}" readonly="readlonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label">Email</label>
                <div class="col-lg-6">
                    <input type="text" name="email" class="form-control" value="{{ $contractor->email }}" readonly="readlonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label">Mobile</label>
                <div class="col-lg-6">
                    <input type="text" name="mobile" class="form-control" value="{{ $contractor->mobile }}" readonly="readlonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label">Role</label>
                <div class="col-lg-6">
                    <input type="text" name="status" class="form-control" value="{{ $contractor->status }}" readonly="readlonly">
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Second table for displaying all keys connected to current contractor -->
<h2 class="page-header">Assigned Keys</h2>
<div class="panel panel-default">
<div class="panel-heading clearfix">
  <b class="pull-left">KEY LIST</b>
  <button class="btn btn-primary pull-right"  data-target="#addKeyModal" data-toggle="modal">Add Key</button>
</div>
<div class="panel-body">
<div class="table-responsive">
<table id="keys-table" class="display nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
        <th>Property</th>
        <th>Pin</th>
        <th>Taken</th>
        <th>Returned</th>
        <th>Options</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($contractor->keys as $key)
    <tr class="clickable-row"  href="{{ URL::route('keys.show', [$key->id]) }}" onmouseover="this.style.cursor='pointer'">
      <td>{{ $key->property->address_line_1 }}</td>
      <td>{{ $key->pin }}</td>
      <td>{{ $key->taken_at }}</td>
      <td>{{ $key->returned_at }}</td>
      <td>
      <form method="POST" action="/contractor/{{ $contractor->id }}/removeKey">
        <input type="hidden" name="key_id" value="{{ $key->id }}"></input>
        {!! csrf_field() !!}
        <a class="btn btn-primary" href="{{ URL::route('keys.edit', $key->id) }}">Edit</a>
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

<!-- Modal for adding new key to current contactor  -->
<div class="modal fade" id="addKeyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Key</h4>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/contractor/{{ $contractor->id }}/addKey" method="POST" autocomplete="off">
            {!! csrf_field() !!}
            <div class="form-group">
                <label>Property</label>
                <select class="form-control" name="property_id">
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->address_line_1 }}</option>
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
        // Add links to individual key pages.
        $('.clickable-row').click(function() {
          window.document.location = $(this).attr("href");
        });

        $('#keys-table').DataTable( {
            "scrollX":true
        });
    } );
</script>
@stop