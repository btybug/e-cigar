@extends('layouts.admin',['activePage'=>'discounts'])
@section('content')
    <div class="d-flex flex-wrap justify-content-between w-100 admin-general--tabs-wrapper">
        <ul class="nav nav-tabs new-main-admin--tabs mb-3 admin-general--tabs">
            <li class="nav-item position-relative">
                <a class="nav-link  "
                   href="{!! route('admin_app_products',$current->id) !!}">
                    Products
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link "
                   href="{!! route('app_staff',$current->id) !!}">
                    Staff
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link "
                   href="{!! route('admin_app_orders',$current->id) !!}">
                    Orders
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link active"
                   href="{!! route('admin_app_settings',$current->id) !!}">
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{!! route("app_customer_discounts",$current->id) !!}">
                    Admin discounts
                    <div class="ripple-container"></div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{!! route("app_customer_offers",$current->id) !!}">
                    Offers
                    <div class="ripple-container"></div>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        {!! Form::model($settings,['url'=>route('admin_app_settings_save')]) !!}
        {!! Form::hidden('shop_id',$q) !!}
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">VAT %</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-card"></i>
                            </div>
                        </div>
                        {!!Form::number('vat',null,['class'=>'form-control','id'=>'tax-rate']) !!}
                    </div>
                </div>
            </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                       aria-controls="v-pills-home" aria-selected="true">General</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                       aria-controls="v-pills-profile" aria-selected="false">Second screen</a>

                </div>
            </div>
            <div class="col-md-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <p>Select Template</p>
                        <div class="row">
                            <div class="col-md-1"><input type="checkbox"></div>
                            <div class="col-md-5" style="height: 200px;background: rgba(214,214,214,0.76);">
                                <div class="row" style="height: 200px;">
                                    <div class="col-md-8" style="border-right: 1px solid;height: 100%">
                                        <p>Image</p>
                                    </div>
                                    <div class="col-md-4"  style="height: 100%">
                                        <p>Item purchased</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-1"><input type="checkbox"></div>
                            <div class="col-md-5" style="height: 200px;background:rgba(214,214,214,0.76);">
                                <p>Image</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
