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
                        <select name="" id="" class="form-control">
                            <option value="">Product</option>
                            <option value="">Order Amount</option>
                            <option value="">Promo code</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="select-product wall-select">
                <div class="form-group">
                    <div class="">
                        <label class="col-md-3 control-label">Select Product</label>
                        <div class="col-md-9">
                            <select name="" id="" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label class="col-md-3 control-label">Count</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-amount wall-select hide">
                <div class="form-group">
                    <div class="">
                        <label class="col-md-3 control-label">Select Amount</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="ex.-30$">
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-promocode wall-select hide">
                <div class="form-group">
                    <div class="col-md-12">
                        Promocode
                    </div>
                </div>
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
@stop