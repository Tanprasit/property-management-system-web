@extends('master')

@section('navigation')
<li class="active"><a href="{{ URL::to( 'properties') }}">Properties<span class="sr-only">(current)</span></a></li>
<li><a href="{{ URL::to( 'devices' ) }}">Devices</a></li>
<li><a href="{{ URL::to( 'contractors' ) }}">Contractors</a></li>
<li><a href="{{ URL::to( 'notifications' ) }}">Notifications</a></li>
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Dashboard</h1>

  <h2 class="sub-header">Table Section</h2>
  <div class="table-responsive">
  </div>
</div>
@stop