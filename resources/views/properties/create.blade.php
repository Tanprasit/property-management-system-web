@extends('master')

@section('navigation')
    @include('nav.properties')
@stop

@section('content')
<div class="row">    
    <h1 class="page-header">Create Property</h1>
    <div class="panel panel-default">        
        <div class="panel-heading clearfix">
            <b>ADDRESS INFORMATION</b>
            <label class="btn btn-primary pull-right" for="form-submit" >Submit</label>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="/properties" autocomplete="off">
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Address Line 1</label>
                    <div class="col-lg-6 input-container">
                        <input id="address_line_1" type="text" name="address_line_1" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Address Line 2</label>
                    <div class="col-lg-6 input-container">
                        <input id="address_line_2" type="text" name="address_line_2" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">City</label>
                    <div class="col-lg-6 input-container">
                        <input id="city" type="text" name="city" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">County</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="county">
                            <optgroup label="England">
                                <option>Bedfordshire</option>
                                <option>Berkshire</option>
                                <option>Bristol</option>
                                <option>Buckinghamshire</option>
                                <option>Cambridgeshire</option>
                                <option>Cheshire</option>
                                <option>City of London</option>
                                <option>Cornwall</option>
                                <option>Cumbria</option>
                                <option>Derbyshire</option>
                                <option>Devon</option>
                                <option>Dorset</option>
                                <option>Durham</option>
                                <option>East Riding of Yorkshire</option>
                                <option>East Sussex</option>
                                <option>Essex</option>
                                <option>Gloucestershire</option>
                                <option>Greater London</option>
                                <option>Greater Manchester</option>
                                <option>Hampshire</option>
                                <option>Herefordshire</option>
                                <option>Hertfordshire</option>
                                <option>Isle of Wight</option>
                                <option>Kent</option>
                                <option>Lancashire</option>
                                <option>Leicestershire</option>
                                <option>Lincolnshire</option>
                                <option>Merseyside</option>
                                <option>Norfolk</option>
                                <option>North Yorkshire</option>
                                <option>Northamptonshire</option>
                                <option>Northumberland</option>
                                <option>Nottinghamshire</option>
                                <option>Oxfordshire</option>
                                <option>Rutland</option>
                                <option>Shropshire</option>
                                <option>Somerset</option>
                                <option>South Yorkshire</option>
                                <option>Staffordshire</option>
                                <option>Suffolk</option>
                                <option>Surrey</option>
                                <option>Tyne and Wear</option>
                                <option>Warwickshire</option>
                                <option>West Midlands</option>
                                <option>West Sussex</option>
                                <option>West Yorkshire</option>
                                <option>Wiltshire</option>
                                <option>Worcestershire</option>
                            </optgroup>
                            <optgroup label="Wales">
                                <option>Anglesey</option>
                                <option>Brecknockshire</option>
                                <option>Caernarfonshire</option>
                                <option>Carmarthenshire</option>
                                <option>Cardiganshire</option>
                                <option>Denbighshire</option>
                                <option>Flintshire</option>
                                <option>Glamorgan</option>
                                <option>Merioneth</option>
                                <option>Monmouthshire</option>
                                <option>Montgomeryshire</option>
                                <option>Pembrokeshire</option>
                                <option>Radnorshire</option>
                            </optgroup>
                            <optgroup label="Scotland">
                                <option>Aberdeenshire</option>
                                <option>Angus</option>
                                <option>Argyllshire</option>
                                <option>Ayrshire</option>
                                <option>Banffshire</option>
                                <option>Berwickshire</option>
                                <option>Buteshire</option>
                                <option>Cromartyshire</option>
                                <option>Caithness</option>
                                <option>Clackmannanshire</option>
                                <option>Dumfriesshire</option>
                                <option>Dunbartonshire</option>
                                <option>East Lothian</option>
                                <option>Fife</option>
                                <option>Inverness-shire</option>
                                <option>Kincardineshire</option>
                                <option>Kinross</option>
                                <option>Kirkcudbrightshire</option>
                                <option>Lanarkshire</option>
                                <option>Midlothian</option>
                                <option>Morayshire</option>
                                <option>Nairnshire</option>
                                <option>Orkney</option>
                                <option>Peeblesshire</option>
                                <option>Perthshire</option>
                                <option>Renfrewshire</option>
                                <option>Ross-shire</option>
                                <option>Roxburghshire</option>
                                <option>Selkirkshire</option>
                                <option>Shetland</option>
                                <option>Stirlingshire</option>
                                <option>Sutherland</option>
                                <option>West Lothian</option>
                                <option>Wigtownshire</option>
                            </optgroup>
                            <optgroup label="Northern Ireland">
                                <option>Antrim</option>
                                <option>Armagh</option>
                                <option>Down</option>
                                <option>Fermanagh</option>
                                <option>Londonderry</option>
                                <option>Tyrone</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-lg-4 control-label">Postcode</label>
                    <div class="col-lg-6 input-container">
                        <input id="postcode" type="text" name="postcode" class="form-control" value="">
                        <span class="glyphicon glyphicon-ok form-control-feedback hidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback hidden" aria-hidden="true"></span>
                        <small>e.g. BL0 7WS</small>
                    </div>
                </div>

                <div class="form-group">
                    <button id="form-submit" class="hidden" type="submit"/>
                </div>
        </form>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/scripts/validation/properties/create.js"></script>
@stop