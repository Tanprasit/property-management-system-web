@extends('master')

@section('navigation')
    @include('nav.devices')
@stop

@section('content')
<h1 class="page-header">Device Details</h1>
<div class="col-lg-6">
        <div class="form-group col-lg-12">
            <label>Model</label>
            <input type="text" name="model" class="form-control" value="{{ $device->model }}" readonly="readonly">
        </div>

        <div class="form-group col-lg-12">
            <label>Manufactorer</label>
            <input type="text" name="manufactorer" class="form-control" value="{{ $device->manufactorer }}" readonly="readonly">
        </div>

        <div class="form-group col-lg-12">
            <label>Product</label>
            <input type="text" name="product" class="form-control" value="{{ $device->product }}" readonly="readonly">
        </div>

        <div class="form-group col-lg-12">
            <label>SDK Version</label>
            <input type="text" name="sdk_version" class="form-control" value="{{ $device->sdk_version }}" readonly="readonly">
        </div>

        <div class="form-group col-lg-12">
            <label>Serial Number</label>
            <input type="text" name="serial_number" class="form-control" value="{{ $device->serial_number }}" readonly="readonly">
        </div>
</div>
<div class="col-lg-6">
    <h2>Terms and Conditions</h2>
    <p>By clicking on "Register" you agree to The Company's' Terms and Conditions</p>

   <p>While rare, prices are subject to change based on exchange rate fluctuations - should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)</p>

    <p>Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)</p>

    <p>Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)</p>
</div>
@stop