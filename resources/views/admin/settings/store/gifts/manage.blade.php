@extends('layouts.admin')
@section('content')
    <div class="create-or-update">
        <form action="" class="form-horizontal">
            <div class="form-group">
                <div class="">
                    <label class="col-md-3 control-label">Title</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="title">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <label class="col-md-3 control-label">Icon</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="icon">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <label class="col-md-3 control-label">Based on</label>
                    <div class="col-md-9">
                        <select name="" id="based-on" class="form-control">
                            <option value="product">Product</option>
                            <option value="order_amount">Order Amount</option>
                            <option value="promo_code">Promo code</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="based-on-container">
                
            </div>
            
            <div class="form-group">
                <div class="">
                    <label class="col-md-3 control-label">Free Juices count</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="2">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <h4>Can be selected </h4>
                    <label class="radio-inline">
                        <input type="radio" name="optradio" checked>All
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optradio">Choose
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optradio">Query
                    </label>
                </div>
            </div>
            <div class="radio-wall-all wall-select">
                <div class="form-group">
                    <div class="col-md-12">
                        1
                    </div>
                </div>
            </div>
            <div class="radio-wall-choose hide wall-select">
                <div class="form-group">
                    <div class="col-md-12">
                        2
                    </div>
                </div>
            </div>
            <div class="radio-wall-query hide wall-select">
                <div class="form-group">
                    <div class="col-md-12">
                        3
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@stop

@section('js')
<script src="{{asset('public/js/custom/gifts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

@stop