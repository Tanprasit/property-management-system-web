@extends('master')

@section('navigation')
    @include('nav.contractors')
@stop

@section('content')
<h1 class="page-header">Edit Contractor</h1>
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <b>CONTRACTOR INFORMATION</b>
        <label class="btn btn-primary pull-right" for="form-submit">Submit</label>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ URL::route('contractors.update', [$contractor->id]) }}">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                <label class="col-lg-4 control-label">Full Name</label>
                <div class="col-lg-6 input-container">
                    <input id="full_name" type="text" name="full_name" class="form-control" value="{{ $contractor->full_name }}">
                    <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label class="col-lg-4 control-label">Email</label>
                <div class="col-lg-6 input-container">
                    <input id="email" type="text" name="email" class="form-control" value="{{ $contractor->email }}">
                    <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label class="col-lg-4 control-label">Mobile</label>
                <div class="col-lg-6 input-container">
                    <input id="mobile" type="text" name="mobile" class="form-control" value="{{ $contractor->mobile }}">
                    <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label">Role</label>
                <div class="col-lg-6">
                    <select class="form-control" name="status">
                        <option>Admin</option>
                        <option>Contractor</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group col-lg-12">
                <button id="form-submit" class="hidden" type="submit"/>
            </div>
        </form>
    </div>
</div>


@stop
@section('scripts')
<script type="text/javascript" src="/scripts/validation/contractors/create.js"></script>
@stop