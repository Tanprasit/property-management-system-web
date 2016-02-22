@extends('master')

@section('navigation')
    @include('nav.notifications')
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Notifications</h1>
      </div>
  </div>
  <br/>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <b>Notification List</b>
            <div class="btn-group pull-right">
                <a href="{{ URL::route('notifications.create') }}" class="btn btn-primary ">Add Notification</a>
            </div>
           </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table id="notifications-table" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                           <th>Type</th>
                           <th>Title</th>
                           <th>Notes</th>
                           <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($notifications as $notification)
                        <tr class="clickable-row" href="{{ URL::route('notifications.show', [$notification->id]) }}" onmouseover="this.style.cursor='pointer'" >
                            <td>{{ $notification->type }}</td>
                            <td>{{ $notification->title }}</td>
                            <td>{{ $notification->notes }}</td>
                            <td>
                                <form method="POST" action="{{ URL::route('notifications.destroy', [$notification->id]) }}">
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a class="btn btn-primary" href="{{ URL::route('notifications.edit', [$notification->id] ) }}">Edit</a>
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
</div>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
@stop


@section('scripts')
<script type="text/javascript" src="lib/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Add links to each notification details page.
        $('.clickable-row').click(function() {
          window.document.location = $(this).attr("href");
        });

        $('#notifications-table').DataTable( {
            "scrollX": true
        });
    } );
</script>
@stop