<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <h2>Billing Address</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {!! Form::model($billing_address,['class'=>'form-horizontal']) !!}
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Name</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-sm-6">
                                                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Company
                                        name</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('company',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">1st Line
                                        address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">2nd line
                                        address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Country</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('country',['' => 'SELECT'] + $countries,null,['class'=>'form-control','id' => 'country']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hide">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Regions</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('region',getRegions(@$billing_address->country,true),null,['class'=>'form-control','id' => 'regions']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hide">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">City</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('city',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Post Code</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::hidden('type','billing_address') !!}
                            {!! Form::hidden('id') !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <h2>Default Shipping</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {!! Form::model($default_shipping,['class'=>'form-horizontal']) !!}
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Name</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-sm-6">
                                                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Company
                                        name</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('company',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">1st Line
                                        address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">2nd line
                                        address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Country</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('country',$countriesShipping,null,['class'=>'form-control','id' => 'geo_country']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Regions</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('region',getRegionByZone(@$default_shipping->country),null,['class'=>'form-control','id' => 'geo_region']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hide">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">City</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('city',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Post Code</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::hidden('type','default_shipping') !!}
                            {!! Form::hidden('id') !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="order-summary-outer">
            <div class="order-summary">
                <table class="table">
                    <thead>
                    <tr>
                        <th align="left" colspan="2">Order Summary</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td align="left"><span>Sub Total</span></td>
                        <td align="right" id="subtotal">
                            @if(Auth::check())
                                ${!! \Cart::session(Auth::id())->getSubTotal() !!}
                            @else
                                ${!! \Cart::getSubTotal() !!}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td align="left"><span>Tax</span></td>
                        <td align="right" id="subtotal">$0</td>
                    </tr>
                    <tr>
                        <td align="left"><span>Shipping {!! ($shipping) ? '('.$shipping->getAttributes()->courier->name.')' : '' !!}</span></td>
                        <td align="right" id="subtotal">${!! ($shipping) ? $shipping->getValue():0 !!}</td>
                    </tr>
                    <tr>
                        <td align="left"><span>Discount (Coupon)</span></td>
                        <td align="right" id="discount">$0</td>
                    </tr>
                    <tr>
                        <td class="last" align="left"><span>Total</span></td>
                        <td class="last" align="right" id="total_price">
                            @if(Auth::check())
                                ${!! \Cart::session(Auth::id())->getTotal() !!}
                            @else
                                ${!! \Cart::getTotal() !!}
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button class="btn btn-block btn-info mt-2">Go to payment</button>
    </div>
</div>
<div class="row">
    <h3>Delivery cost</h3>
    <table class="table table-style table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Order Amount</th>
            <th>Courier</th>
            <th>Cost</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
        @if($geoZone && count($geoZone->deliveries))
            @foreach($geoZone->deliveries as $delivery)
                <tr>
                    <td>{!! $delivery->min !!} To {!! $delivery->max !!}</td>
                    <td colspan="3"></td>
                </tr>
                @if(count($delivery->options))
                    @foreach($delivery->options as $option)
                        <tr>
                            <td></td>
                            <td>
                                <input data-delivery="{{ $delivery->id }}" type="radio" {!! ($shipping && $shipping->getAttributes()->id == $option->id) ? 'checked' : "" !!} name="courier_change" value="{!! $option->id !!}" class="select-shipping-method" />
                                {!! $option->courier->name !!}
                            </td>
                            <td>
                                {!! $option->cost !!}
                            </td>
                            <td>
                                {!! $option->time !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        @endif
        </tbody>
    </table>

</div>