@extends('master')

@section('navigation')
    @include('nav.properties')
@stop

@section('content')
<div class="row">    
    <h1 class="page-header">Create Properties</h1>
    <div class="panel panel-default">        
        <div class="panel-heading clearfix">
            <b>Property details</b>
            <label class="btn btn-primary pull-right" for="form-submit" >Submit</label>
        </div>
        <div class="panel-body">
            <div class="col-lg-6">
                <form method="POST" action="/properties" autocomplete="off">
                    {!! csrf_field() !!}
                    <div class="form-group col-lg-12">
                        <label>Address Line 1</label>
                        <input type="text" name="address_line_1" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Address Line 2</label>
                        <input type="text" name="address_line_2" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>County</label>
                        <input type="text" name="county" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Postcode</label>
                        <input type="text" name="postcode" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-12">
                        <button id="form-submit" class="hidden" type="submit"/>
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
    </div>
</div>
@stop