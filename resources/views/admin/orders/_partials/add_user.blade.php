<div class="row">
    {!! Form::hidden('user_id',($user) ?$user->id:null,['id' => 'order_user']) !!}
    {{--<div class="col-md-4">--}}
        {{--<div class="user-img-name cursor-pointer" data-toggle="modal" data-target=".customer-details-modal">--}}
            {{--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIz-Vq2guLXBClPdqx9lLCN7lrSO_sSirya67ETwY4Zq4gXc9U"--}}
                 {{--alt="product">--}}
            {{--<div class="name">{{ ($user) ? $user->name . ' ' . $user->last_name : 'No User' }}</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    @php
        $billing_address= ($user) ? $user->addresses()->where('type','billing_address')->first() : null;
        $default_shipping=($user) ? $user->addresses()->where('type','default_shipping')->first() : null;
    @endphp
    <div class="col-md-12">
        <div class="panel panel-default panels-address">
            <div class="panel-heading">
                <div class="user-name">
                    {{ ($user) ? $user->name . ' ' . $user->last_name : 'No User' }}
                </div>
                <div class="edit" data-toggle="modal" data-target=".customer-details-modal">
                    Edit
                </div>
            </div>
            <div class="panel-body">
                <div class="tabs-address">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#billing-address">Billing address</a></li>
                        <li><a data-toggle="tab" href="#shipping-address">Shipping address</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="billing-address" class="tab-pane fade in active">
                            <h3>Billing address</h3>
                            <div class="col-md-12">
                                {!! Form::model($billing_address,['class'=>'form-horizontal']) !!}
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Company name</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('company',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Country</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('country',['' => 'SELECT'] + $countries,null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Regions</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('region',null,['class'=>'form-control','id' => 'regions']) !!}
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

                                {!! Form::close() !!}

                            </div>
                        </div>
                        <div id="shipping-address" class="tab-pane fade">
                            <h3> Shipping address</h3>
                            <div class="col-md-12">
                                {!! Form::model($default_shipping,['class'=>'form-horizontal']) !!}
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Company name</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('company',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
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
                                            {!! Form::select('region',getRegionByZone(@$default_shipping->country),($default_shipping)?$default_shipping->region:null,['class'=>'form-control','id' => 'geo_region']) !!}
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
    </div>

</div>