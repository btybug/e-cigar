@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div id="content" class="geo-zone-page">
        {!! Form::model($shipping_zone,['url'=> route('admin_store_shipping_zone_save'),'class' => 'form-horizontal','files' => true ]) !!}
        {!! Form::hidden('id',null) !!}
        <div class="page-header">
            <div class="container-fluid">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i>
                    </button>
                    <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i
                                class="fa fa-reply"></i></a></div>
                <h1>Geo Zones</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Geo Zones</a></li>
                </ul>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid">
            <div class="panel panel-default">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" id="tab-geo-zone" data-toggle="tab" href="#geo-zone" role="tab"
                           aria-controls="geo-zone" aria-selected="true" aria-expanded="true"><i
                                    class="fa fa-pencil"></i> Add Geo Zone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-delivery-cost" data-toggle="tab" href="#delivery-cost" role="tab"
                           aria-controls="delivery-cost" aria-selected="false">Delivery Cost</a>
                    </li>
                </ul>
                <div class="tab-content tab-content-store-settings">
                    <div class="tab-pane fade active in" id="geo-zone" role="tabpanel" aria-labelledby="delivery-cost">
                        <div class="panel-body panel-body--new-shipping-zone">
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-name">Geo Zone Name</label>
                                <div class="col-sm-10">
                                    {!! Form::text('name',$shipping_zone->name??null,['placeholder'=>'Geo Zone Name','id' => 'input-name','class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-description">Description</label>
                                <div class="col-sm-10">
                                    {!! Form::text('description',$shipping_zone->description??null,['placeholder'=>'Description','id' => 'input-description','class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label class="col-sm-2 control-label" for="input-tax">Tax</label>
                                <div class="col-sm-5">
                                    {!! Form::text('tax',$shipping_zone->tax??null,['placeholder'=>'Tax','id' => 'input-tax','class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-5">
                                    {!! Form::select('percentage',[1 =>'percentage', 2 => 'other'],[$shipping_zone->percentage??null],['id' => 'pecentage', 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="input-description">Payment
                                    Options</label>
                                <div class="col-sm-10">
                                    {!! Form::select('tags',$activePayments,null,['class' => 'form-control']) !!}
                                    <ul class="dropdown-menu"></ul>
                                    <div id="coupon-category" class="well well-sm view-coupon">
                                        <ul class="coupon-category-list" style="list-style: none">
                                        </ul>
                                    </div>
                                    <input type="hidden" class="search-hidden-input" value="" id="category-names">
                                </div>
                            </div>

                            <fieldset>
                                <legend>Geo Zones</legend>
                                <table id="zone-to-geo-zone" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td class="text-left">Country</td>
                                        <td class="text-left">Category</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td>
                                            {!! Form::select('country',[$countries],[$shipping_zone->country??null],['id' => 'country', 'class'=>'form-control']) !!}
                                        </td>
                                        <td>
                                            <div>
                                                {!! Form::text('region',$shipping_zone->region??null,['placeholder'=>'Region','id' => 'region','class' => 'form-control','autocomplete' => 'off']) !!}
                                                <ul class="dropdown-menu"></ul>
                                                <div id="coupon-category" class="well well-sm view-coupon">
                                                    <ul class="coupon-category-list" style="list-style: none">
                                                    </ul>
                                                </div>
                                                <input type="hidden" class="search-hidden-input" value=""
                                                       id="category-names">
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="delivery-cost" role="tabpanel" aria-labelledby="delivery-cost">
                        <table class="table table-responsive table--store-settings" data-table-id="20">
                            <tr class="bg-my-light-blue">

                                <td colspan="6">
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-name"> Delivery cost</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('delivery_cost',['Based on Order amount'=>'Based on Order amount','Based on weight'=>'Based on weight'],null,['placeholder'=>'Geo Zone Name','id' => 'input-name','class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tbody>

                            <tr class="bg-my-light-pink">
                                <th>Order Amount</th>
                                <th>Courier</th>
                                <th>Cost</th>
                                <th colspan="3">Time</th>
                            </tr>
                            <tr>
                                <td class="table--store-settings_vert-top">
                                    <input type="number" min="1" max="5" class="form-control"
                                           style="display: inline-block; width: auto">
                                    <span>To</span>
                                    <input type="number" min="1" max="50" class="form-control"
                                           style="display: inline-block; width: auto">
                                </td>
                                <td>
                                    <select id="PosType" class="form-control">
                                        <option selected>Normal Post</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                            <span class="form-control">
                                5
                            </span>
                                </td>
                                <td>
                            <span class="form-control">
                                3 days
                            </span>
                                </td>
                                <td colspan="2" class="text-right">
                                    <button type="button" class="btn btn-danger remove-ship-filed"><i
                                                class="fa fa-minus-circle"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <select id="dhl" class="form-control">
                                        <option selected>DHL</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                            <span class="form-control">
                                5
                            </span>
                                </td>
                                <td>
                            <span class="form-control">
                                1 day
                            </span>
                                </td>
                                <td colspan="2" class="text-right">
                                    <button type="button" class="btn btn-danger remove-ship-filed"><i
                                                class="fa fa-minus-circle"></i></button>
                                </td>
                            </tr>
                            <tr class="add-new-ship-filed-container">
                                <td colspan="6" class="text-right">
                                    <button type="button" class="btn btn-primary add-new-ship-filed"><i
                                                class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            </tbody>

                            <tfoot>


                            <tr>
                                <td colspan="5"
                                    class="text-center table--store-settings_add-options add-new-order-filed">
                                    <span><i class="fa fa-plus"></i></span> Add more option
                                </td>
                            </tr>


                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        {!!   Form::close()   !!}
    </div>
@stop
@section("css")
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script>
        $("body").on("input", "#region", function (e) {
            e.preventDefault()
            let country = $('#country').val();
            let val = $(this).val();
            $("#coupon-category").show()

            AjaxCall("/admin/store/shipping-zones/find-region", {id: val, country: country}, function (res) {
                if (!res.error) {
                    $('.coupon-category-list').empty()
                    console.log(res)
                    Object.values(res.data).forEach(item = > {
                        if(item !== null
                )
                    {
                        $('.coupon-category-list').append(`<li class="region-item">${item}</li>`);

                    }
                })
                }
            })
        })

        $("body").on("click", ".region-item", function () {
            let value = $(this).text()
            $("#region").val(value)
            $('.coupon-category-list').empty()
            $("#coupon-category").hide()

        })
    </script>
    <script>
        let datax = `@foreach($shipping_zones as $zone)
            <option value="{!! $zone->tax !!}">{!! $zone->name !!}</option>
                @endforeach`
        $("body").on("click", ".add-new-option", function () {
            const id = Date.now()
            let html = `<tr class="container-for-table-remove" data-table-id="${id}">
   <td>
      <label for="ShippingZones">Shipping to</label>
   </td>
   <td>
      <select id="ShippingZones" class="form-control">
         <option selected="">Shipping Zones</option>
         ${datax}
      </select>
   </td>
   <td class="text-right">
      <button type="button" data-table-id=${id} class="btn btn-primary delete-all-option"><i class="fa fa-trash"></i></button>
   </td>
</tr>`
            let html2 = `
<table class="table table-responsive table--store-settings container-for-table-remove" data-table-id="${id}">
                <tr class="bg-my-light-blue">
                <td>Shipping Zone - <span class="shipzone">Armenia</span></td>
                <td colspan="3">Tax Rate - <span class="taxzone">ArmeniaVaT20</span></td>
                <td colspan="2" class="text-right"><button type="button" data-table-id="${id}" class="btn btn-primary delete-all-option"><i class="fa fa-trash"></i></button></span></td>
                    </tr>
                    <tbody>

                    <tr class="bg-my-light-pink">
                        <th>Order Amount</th>
                        <th>Courier</th>
                        <th>Cost</th>
                        <th colspan="3">Time</th>
                    </tr>
                    <tr>
                        <td class="table--store-settings_vert-top">
                            <input type="number" min="1" max="5" class="form-control" style="display: inline-block; width: auto">
                            <span>To</span>
                            <input type="number" min="1" max="50" class="form-control" style="display: inline-block; width: auto">
                        </td>
                        <td>
                            <select id="PosType" class="form-control">
                                <option selected>Normal Post</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                3 days
                            </span>
                        </td>
                        <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <select id="dhl" class="form-control">
                                <option selected>DHL</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                1 day
                            </span>
                        </td>
                        <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                    <tr class="add-new-ship-filed-container">
                        <td colspan="6" class="text-right">
                            <button type="button" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-center table--store-settings_add-options add-new-order-filed">
                            <span><i class="fa fa-plus"></i></span> Add more option
                        </td>
                    </tr>
                    </tfoot>
                </table>`
            $(".all-options").append(html)
            $("#myTabContent").append(html2)
        })

        $("body").on("click", ".remove-ship-filed", function(){
            $(this).closest("tr").remove()
        })
        $("body").on("click", ".add-new-ship-filed", function(){

            let html = `<tr>
   <td></td>
   <td>
      <select id="dhl" class="form-control">
         <option selected="">DHL</option>
         <option>...</option>
      </select>
   </td>
   <td>
      <span class="form-control">
      5
      </span>
   </td>
   <td>
      <span class="form-control">
      1 day
      </span>
   </td>
   <td colspan="2" class="text-right">
      <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
   </td>
</tr>`
            $(this).closest("tbody").find(".add-new-ship-filed-container").before(html)
        })

        $("body").on("click", ".delete-all-option", function (e) {
            console.log()
            let id =  $(this).attr("data-table-id")
            $("body").find(`[data-table-id="${id}"]`).closest(".container-for-table-remove").remove()
        })
        $("body").on("click", ".add-new-order-filed", function (e) {
            // console.log(e)
            let html = `  <tbody>

   <tr class="bg-my-light-pink">
      <th>Order Amount</th>
      <th>Courier</th>
      <th>Cost</th>
      <th colspan="3">Time</th>
   </tr>
   <tr>
      <td class="table--store-settings_vert-top">
         <input type="number" min="1" max="5" class="form-control" style="display: inline-block; width: auto">
         <span>To</span>
         <input type="number" min="1" max="50" class="form-control" style="display: inline-block; width: auto">
      </td>
      <td>
         <select id="PosType" class="form-control">
            <option selected="">Normal Post</option>
            <option>...</option>
         </select>
      </td>
      <td>
         <span class="form-control">
         5
         </span>
      </td>
      <td>
         <span class="form-control">
         3 days
         </span>
      </td>
      <td colspan="2" class="text-right">
         <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
      </td>
   </tr>
   <tr>
      <td></td>
      <td>
         <select id="dhl" class="form-control">
            <option selected="">DHL</option>
            <option>...</option>
         </select>
      </td>
      <td>
         <span class="form-control">
         5
         </span>
      </td>
      <td>
         <span class="form-control">
         1 day
         </span>
      </td>
      <td colspan="2" class="text-right">
         <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
      </td>
   </tr>
   <tr class="add-new-ship-filed-container">
      <td colspan="6" class="text-right">
         <button type="button" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
      </td>
   </tr>
</tbody>`
            $(this).closest("table").append(html)
        })

        $('body').on('change','#ShippingZones',function (e) {
            console.log(1111)
            e.preventDefault();
            let val = $(this).val();
            let text = $(this).closest("tr").find("#ShippingZones :selected").text();
            let id = $(this).closest("tr").attr("data-table-id")

            let html2 = `
<table class="table table-responsive table--store-settings container-for-table-remove" data-table-id="${id}">
                <tr class="bg-my-light-blue">
                <td>Shipping Zone - <span class="shipzone">${val}</span></td>
                <td colspan="3">Tax Rate - <span class="taxzone">${text}</span></td>
                <td colspan="2" class="text-right"><button type="button" data-table-id="${id}" class="btn btn-primary delete-all-option"><i class="fa fa-trash"></i></button></span></td>
                    </tr>
                    <tbody>

                    <tr class="bg-my-light-pink">
                        <th>Order Amount</th>
                        <th>Courier</th>
                        <th>Cost</th>
                        <th colspan="3">Time</th>
                    </tr>
                    <tr>
                        <td class="table--store-settings_vert-top">
                            <input type="number" min="1" max="5" class="form-control" style="display: inline-block; width: auto">
                            <span>To</span>
                            <input type="number" min="1" max="50" class="form-control" style="display: inline-block; width: auto">
                        </td>
                        <td>
                            <select id="PosType" class="form-control">
                                <option selected>Normal Post</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                3 days
                            </span>
                        </td>
                        <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <select id="dhl" class="form-control">
                                <option selected>DHL</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                1 day
                            </span>
                        </td>
                        <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                    <tr class="add-new-ship-filed-container">
                        <td colspan="6" class="text-right">
                            <button type="button" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-center table--store-settings_add-options add-new-order-filed">
                            <span><i class="fa fa-plus"></i></span> Add more option
                        </td>
                    </tr>
                    </tfoot>
                </table>`


            // console.log($(`table[data-table-id="${id}"]`))
            // $(`table[data-table-id="${id}"]`).find('.shipzone').text(text);
            // console.log($(`table[data-table-id="${id}"]`).find('.shipzone').text())
            // $(`table[data-table-id="${id}"]`).find('.taxzone').text(val);
            $("#myTabContent").append(html2)

        });
    </script>
@stop