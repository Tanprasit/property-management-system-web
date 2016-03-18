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
            <div class="form-group">
                <label class="col-lg-4 control-label">Full Name</label>
                <div class="col-lg-6">
                    <input type="text" name="full_name" class="form-control" value="{{ $contractor->full_name }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">Email</label>
                <div class="col-lg-6">
                    <input type="text" name="email" class="form-control" value="{{ $contractor->email }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label">Mobile</label>
                <div class="col-lg-6">
                    <input type="text" name="mobile" class="form-control" value="{{ $contractor->mobile }}">
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