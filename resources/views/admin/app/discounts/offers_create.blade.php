@extends('layouts.admin',['activePage'=>'others'])
@section('content')
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="d-flex justify-content-between card-header card-header-primary">
                    <div>
                        <h4 class="card-title mt-0">Offers</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mx-0 mb-3">
                        <select name="" id="offers_select" class="form-control col-sm-3">
                            <option value="">Select</option>
                            <option value="buy_x_get">Buy X Get Y</option>
                            <option value="item2">item2</option>
                        </select>
                    </div>
    <div class="buy_x_get d-none content-select-wrap">
        <div class="col-md-8">
            {!! Form::model($model, ['id' => 'form-discount','class' => 'form-horizontal']) !!}
            {!! Form::hidden('id') !!}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label for="offer_name" class="col-sm-4 col-form-label">Offer Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="offer_name" placeholder="Offer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="customer_buy" class="col-sm-8 col-form-label">If Customer Buy</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="customer_buy" placeholder="8">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="get_free" class="col-sm-8 col-form-label">He will get free</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="get_free" placeholder="1">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-2">
                    <div class="form-group row">
                        <select name="" id="" class="form-control select_to_2_js" multiple="multiple">
                            <option value="">Select item1,Select item2</option>
                            <option value="">item1</option>
                            <option value="">item2</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <select name="" id="" class="form-control select_to_2_js" multiple="multiple">
                            <option value="">Select gift(juice)</option>
                            <option value="">item1</option>
                            <option value="">item2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

                </div>
            </div>
        </div>
@stop
@section('css')
    <link href="/public/plugins/select2/select2.min.css" rel="stylesheet"/>
@stop
@section('js')
    <script src="/public/plugins/select2/select2.full.min.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('change','#offers_select',function () {
                if($(this).val()==='buy_x_get'){
                    $(this).closest('.card-body').find(`.${$(this).val()}`).removeClass('d-none')
                }else {
                    $(this).closest('.card-body').find('.content-select-wrap').addClass('d-none')
                }
            });

            $('.select_to_2_js').select2();
        })
    </script>
@stop
