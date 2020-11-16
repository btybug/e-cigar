@extends('layouts.admin',['activePage'=>'others'])
@section('content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="d-flex justify-content-between card-header card-header-primary">
                <div>
                    <h4 class="card-title mt-0">Offers</h4>
                </div>
            </div>
            {!! Form::model($model, ['id' => 'form-discount','class' => 'form-horizontal']) !!}
            <div class="card-body">
                <div class="row mx-0 mb-3">
                    {!! Form::select('type',[null=>'Select Type',
                    'buy_x_get'=>'Buy X Get Y',
                    'mix_match'=>'Mix Match',
                    'mixed'=>'Quantity discount identical items',
                    ],null,['class'=>'form-control col-sm-3','id'=>'offers_select']) !!}
                </div>
                <div id="pattern_place_js">
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Start at</label>
                    <div class="col-md-4">
                        <input id="textinput" name="start_at" type="date"  class="form-control input-md">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">End at</label>
                    <div class="col-md-4">
                        <input id="textinput" name="end_at" type="date"  class="form-control input-md">
                    </div>

            </div>
            {!! Form::close() !!}
                <div class="buy_x_get d-none pattern_js content-select-wrap">
                    <div class="col-md-8">

                        {!! Form::hidden('id') !!}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="offer_name" class="col-sm-4 col-form-label">Offer Name</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('name',null,['class'=>'form-control offer_name']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="customer_buy" class="col-sm-8 col-form-label">If Customer Buy</label>
                                    <div class="col-sm-4">
                                        {!! Form::text('if_by',($model)?$model->data['if_by']:null,['class'=>'form-control customer_buy']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="get_free" class="col-sm-8 col-form-label">He will get free</label>
                                    <div class="col-sm-4">
                                        {!! Form::text('get_free',($model)?@$model->data['get_free']:null,['class'=>'form-control get_free']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                <div class="form-group row">
                                    {!! Form::select('items[]',$items,($model)?@$model->data['items']:null,['class'=>'form-control select_to_2_js','multiple']) !!}
                                </div>
                                <div class="form-group row">
                                    {!! Form::select('gifts[]',$items,($model)?@$model->data['gifts']:null,['class'=>'form-control select_to_2_js','multiple']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                </div>
                <div class="mix_match d-none pattern_js content-select-wrap">
                    <div class="col-md-8">

                        {!! Form::hidden('id') !!}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="offer_name" class="col-sm-4 col-form-label">Offer Name</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('name',null,['class'=>'form-control offer_name']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="customer_buy" class="col-sm-8 col-form-label">If Customer Buy</label>
                                    <div class="col-sm-4">
                                        {!! Form::text('if_by',($model)?$model->data['if_by']:null,['class'=>'form-control customer_buy']) !!}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <table id="tablePreview" class="table">

                                        <!--Table body-->
                                        <tbody>
                                        <tr>
                                            <th scope="row"><input type="radio" name="option" value="give_them_all_by"></th>
                                            <td colspan="2">Give them all by</td>
                                            <td><span>&#163;</span></td>
                                            <td colspan="2"><input type="number" name="give_them_all_by"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="radio" name="option" value="give_cheapest_free"></th>
                                            <td colspan="5">Give cheapest free</td>

                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="radio" name="option" value="give_fixed_discount"></th>
                                            <td colspan="2">Give this fixed discount</td>
                                            <td colspan="2"><span>&#163;</span></td>
                                            <td ><input type="number" name="give_fixed_discount"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input type="radio" name="option" value="give_the_discount"></th>
                                            <td colspan="2">Give the discount</td>
                                            <td colspan="2"><span>%</span></td>
                                            <td><input type="number" name="give_the_discount"></td>
                                        </tr>
                                        </tbody>
                                        <!--Table body-->
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="customer_buy" class="col-sm-8 col-form-label">From</label>
                                    <div class="col-sm-4">
                                        {!! Form::select('items[]',$items,($model)?$model->data['items']:null,['class'=>'form-control select_to_2_js','multiple']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                </div>
                <div class="mixed d-none pattern_js content-select-wrap">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="offer_name" class="col-sm-4 col-form-label">Offer Name</label>
                                <div class="col-sm-8">
                                    {!! Form::text('name',null,['class'=>'form-control offer_name']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="customer_buy" class="col-sm-8 col-form-label">If Customer Buy</label>
                                    <div class="col-sm-4">
                                        {!! Form::text('if_by',($model)?$model->data['if_by']:null,['class'=>'form-control customer_buy']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                <div class="form-group row">
                                    {!! Form::select('items[]',$items,($model)?@$model->data['items']:null,['class'=>'form-control select_to_2_js','multiple']) !!}
                                </div>
                            </div>
                        </div>
                        <table id="tablePreview" class="table">

                            <!--Table body-->
                            <tbody>
                            <tr>
                                <th scope="row"><input type="radio"></th>
                                <td colspan="2">Give them all for</td>
                                <td><span>&#163;</span></td>
                                <td colspan="2"><input type="number"></td>
                            </tr>
                            <tr>
                                <th scope="row"><input type="radio"></th>
                                <td>Give</td>
                                <td><input type="number"></td>
                                <td colspan="3">For free</td>

                            </tr>
                            <tr>
                                <th scope="row"><input type="radio"></th>
                                <td>Give</td>
                                <td><input type="number"></td>
                                <td>For</td>
                                <td><span>&#163;</span></td>
                                <td><input type="number"></td>
                            </tr>
                            <tr>
                                <th scope="row"><input type="radio"></th>
                                <td>Give</td>
                                <td><input type="number"></td>
                                <td>For</td>
                                <td><span>%</span></td>
                                <td><input type="number"></td>
                            </tr>
                            </tbody>
                            <!--Table body-->
                        </table>

                        <div class="text-left">
                            <button type="submit" class="btn btn-primary">Save</button>
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
            if($('#offers_select').val()){
                $('#pattern_place_js').html($('body').find('.'+$('#offers_select').val()).clone());
                $('#pattern_place_js '+'.'+$('#offers_select').val()).removeClass('d-none').removeClass('pattern_js');
            }


            $('body').on('change', '#offers_select', function () {
                console.log($('body').find('.select_to_2_js'))
                if ($(this).val() === 'buy_x_get') {
                    $('#pattern_place_js').html($('body').find('.'+$('#offers_select').val()).clone());
                    $('#pattern_place_js '+'.'+$('#offers_select').val()).removeClass('d-none').removeClass('pattern_js');
                } else if($(this).val() === 'mix_match') {
                    $('#pattern_place_js').html($('body').find('.'+$('#offers_select').val()).clone());
                    $('#pattern_place_js '+'.'+$('#offers_select').val()).removeClass('d-none').removeClass('pattern_js');
                }else if($(this).val() === 'mixed') {
                    $('#pattern_place_js').html($('body').find('.'+$('#offers_select').val()).clone());
                    $('#pattern_place_js '+'.'+$('#offers_select').val()).removeClass('d-none').removeClass('pattern_js');
                }

                $('body').find('#pattern_place_js .select_to_2_js').select2();
            });
            $('body').find('#pattern_place_js .select_to_2_js').select2();
        })
    </script>
@stop
