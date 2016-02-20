@extends('master')

@section('navigation')
    @include('nav.contractor')
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Edit Contractor</h1>
    <div class="col-lg-6">
        <form method="POST" action="{{ URL::route('contractors.update', [$contractor->id]) }}">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}
            <div class="form-group col-lg-12">
                <label>Full Name</label>
                <input type="text" name="full_name" class="form-control" value="{{ $contractor->full_name }}">
            </div>
            <div class="form-group col-lg-12">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $contractor->email }}">
            </div>

            <div class="form-group col-lg-12">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control" value="{{ $contractor->mobile }}">
            </div>

            <div class="form-group col-lg-12">
                <label>Role</label>
                <select class="form-control" name="status">
                    <option>Admin</option>
                    <option>Contractor</option>
                </select>
            </div>
            
            <div class="form-group col-lg-12">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-lg-6">
        <h2>Terms and Conditions</h2>
        <p>By clicking on "Register" you agree to The Company's' Terms and Conditions</p>

       <p>While rare, prices are subject to change based on exchange rate fluctuations - should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)</p>

        <p>Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)</p>

        <p>Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)</p>
    </div>
</div>
@stop