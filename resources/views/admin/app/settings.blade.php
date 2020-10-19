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
        </ul>
    </div>
    <div class="col-md-8">
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
       {!! Form::close() !!}

    </div>
@stop
