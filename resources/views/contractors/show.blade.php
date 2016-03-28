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
@stop