@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div id="content" class="geo-zone-page">
        <div class="alert alert-danger error-place" style="display: none"></div>
        {!! Form::model($geo_zone,['url'=> route('admin_settings_geo_zone_save',($geo_zone)?$geo_zone->id:null),'class' => 'form-horizontal','files' => true, 'id' => 'geo-zones-form' ]) !!}
        <div class="page-header">
            <div class="container-fluid">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary geo-zones-submit" data-original-title="Save"><i
                                class="fa fa-save"></i>
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
                                    {!! Form::text('name',null,['placeholder'=>'Geo Zone Name','id' => 'input-name','class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-description">Description</label>
                                <div class="col-sm-10">
                                    {!! Form::text('description',null,['placeholder'=>'Description','id' => 'input-description','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="input-description">Payment
                                    Options</label>
                                <div class="col-sm-10 wall">
                                    {!! Form::text('',null,['class' => 'form-control','id'=>'payment_options']) !!}
                                    <ul class="dropdown-menu "></ul>
                                    <div id="coupon-category" class="well well-sm view-coupon">
                                        <ul class="coupon-category-list" style="list-style: none"></ul>
                                    </div>
                                    {!! Form::hidden('payment_options',null,['id'=>'category-names','class'=>'search-hidden-input']) !!}
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-tax-id">Tax Rate</label>
                                <div class="col-sm-10">
                                    {!! Form::select('tax_rate_id',[null=>'No Tax']+$tax_rates,null,['id' => 'input-tax-id','class' => 'form-control']) !!}
                                </div>
                            </div>
                            <fieldset>
                                <legend>Geo Zones</legend>
                                <table id="zone-to-geo-zone" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td class="text-left">Country</td>
                                        <td class="text-left">Regions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    @foreach($geo_zone->countries as $key=>$country)
                                        <tr>
                                            <td>
                                                {!! Form::select('country['.$key.']',$countries,$country->name,[ 'class'=>'country form-control', 'data-count' => "0"]) !!}
                                            </td>
                                            <td>
                                                <div class="wall">
                                                    <div class="region-container">
                                                        @if($country->all)
                                                        {!! Form::select('region['.$key.']',getRegions($country->name),'all_selected',['class'=>'form-control region']) !!}
                                                        @else
                                                            {!! Form::select('region['.$key.']',getRegions($country->name),$country->region->name,['class'=>'form-control region']) !!}
                                                        @endif
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <button type="button" data-count="0" class="add-new-get-zones"><i
                                                                class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tfoot>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="delivery-cost" role="tabpanel" aria-labelledby="delivery-cost">
                        @if($geo_zone)

                            @foreach($geo_zone->deliveries as $key=>$delivery)
                                <table class="table table-responsive table--store-settings" data-table-id="20">
                                    @if(!$key)
                                        <tr class="bg-my-light-blue">

                                            <td colspan="6">
                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-name"> Delivery
                                                        cost</label>
                                                    <div class="col-sm-10">
                                                        {!! Form::select('delivery_cost_types_id',$delivery_types,$delivery->delivery_cost_types_id,['id' => 'input-name','class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    <tbody>

                                    <tr class="bg-my-light-pink">
                                        <th>{!! ($delivery->delivery_cost_types_id==1)?'Order Amount':'Weight Amount' !!}</th>
                                        <th>Courier</th>
                                        <th>Cost</th>
                                        <th colspan="3">Time</th>
                                    </tr>
                                    @foreach($delivery->options as $key=>$option)
                                        <tr>

                                            <td class="table--store-settings_vert-top">
                                                @if(!$key)
                                                    {!! Form::number('delivery_cost['.$delivery->id.'][min]',$delivery->min,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                                                    <span>To</span>
                                                    {!! Form::number('delivery_cost['.$delivery->id.'][max]',$delivery->max,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                                                @endif
                                            </td>

                                            <td>
                                                {!! Form::select('delivery_cost['.$delivery->id.'][options]['.$option->id.'][courier_id]',$active_couriers,$option->courier_id,['class'=>'form-control']) !!}
                                            </td>
                                            <td>
                                                {!! Form::number('delivery_cost['.$delivery->id.'][options]['.$option->id.'][cost]',$option->cost,['class'=>'form-control','min'=>'0', 'max'=>"99999.99",'step'=>'0.01']) !!}

                                            </td>
                                            <td>
                                                {!! Form::text('delivery_cost['.$delivery->id.'][options]['.$option->id.'][time]',$option->time,['class'=>'form-control','placeholder'=>'3 day']) !!}

                                            </td>
                                            <td colspan="2" class="text-right">
                                                <button type="button" class="btn btn-danger remove-ship-filed"><i
                                                            class="fa fa-minus-circle"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="add-new-ship-filed-container">
                                        <td colspan="6" class="text-right">
                                            <button type="button" data-id="{!! $delivery->id !!}"
                                                    data-options-count="{!! $option->id !!}"
                                                    data-exists="true"
                                                    class="btn btn-primary add-new-ship-filed"><i
                                                        class="fa fa-plus-circle"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>

                                    <tfoot>


                                    <tr>
                                        <td colspan="5" data-id="{!! $delivery->id !!}"
                                            class="text-center table--store-settings_add-options add-new-order-filed">
                                            <span><i class="fa fa-plus"></i></span> Add more option
                                        </td>
                                    </tr>


                                    </tfoot>
                                </table>
                            @endforeach
                        @else
                            <table class="table table-responsive table--store-settings" data-table-id="20">
                                <tr class="bg-my-light-blue">

                                    <td colspan="6">
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-name"> Delivery
                                                cost</label>
                                            <div class="col-sm-10">
                                                {!! Form::select('delivery_cost_types_id',$delivery_types,null,['id' => 'input-name','class' => 'form-control']) !!}
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

                                        {!! Form::number('delivery_cost[0][min]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                                        <span>To</span>
                                        {!! Form::number('delivery_cost[0][max]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}

                                    </td>
                                    <td>
                                        {!! Form::select('delivery_cost[0][options][0][courier_id]',$active_couriers,null,['class'=>'form-control']) !!}
                                    </td>
                                    <td>
                                        {!! Form::number('delivery_cost[0][options][0][cost]',null,['class'=>'form-control','min'=>'0', 'max'=>"99999.99",'step'=>'0.01']) !!}

                                    </td>
                                    <td>
                                        {!! Form::text('delivery_cost[0][options][0][time]',null,['class'=>'form-control','placeholder'=>'3 day']) !!}

                                    </td>
                                    <td colspan="2" class="text-right">
                                        <button type="button" class="btn btn-danger remove-ship-filed"><i
                                                    class="fa fa-minus-circle"></i></button>
                                    </td>
                                </tr>
                                <tr class="add-new-ship-filed-container">
                                    <td colspan="6" class="text-right">
                                        <button type="button" data-id="0" data-options-count="0"
                                                data-exists="false"
                                                class="btn btn-primary add-new-ship-filed"><i
                                                    class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                                </tbody>

                                <tfoot>


                                <tr>
                                    <td colspan="5" data-order-count="0"
                                        class="text-center table--store-settings_add-options add-new-order-filed">
                                        <span><i class="fa fa-plus"></i></span> Add more option
                                    </td>
                                </tr>


                                </tfoot>
                            </table>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        {!!   Form::close()   !!}
    </div>
@stop
@section("css")
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">

    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js')}}"></script>
    <script src="{{asset('public/js/custom/get_zones.js')}}"></script>

    <script>
        var count = {!! isset($delivery)?($delivery->id + 1) : 1 !!}
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
{!! Form::number('delivery_cost[${count}][min]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                <span>To</span>
                {!! Form::number('delivery_cost[${count}][max]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}

                </td>
                 <td>
                                        {!! Form::select('delivery_cost[${count}][options][0][courier_id]',$active_couriers,null,['class'=>'form-control']) !!}
                </td>
                <td>
                    {!! Form::number('delivery_cost[${count}][options][0][cost]',null,['class'=>'form-control','min'=>'0', 'max'=>"99999.99",'step'=>'0.01']) !!}

                </td>
                <td>
                    {!! Form::text('delivery_cost[${count}][options][0][time]',null,['class'=>'form-control','placeholder'=>'3 day']) !!}

                </td>

          <td colspan="2" class="text-right">
          <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
          </td>

          </tr>
          <tr class="add-new-ship-filed-container">
          <td colspan="6" class="text-right">
          <button type="button" data-options-count="1"  data-id="${count}" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
</td>
</tr>
</tbody>`;
            count++
            $(this)
                .closest("table")
                .append(html);
        });

        let datax = "";
        $("body").on("click", ".add-new-option", function () {
            const id = Date.now();
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
<button type="button"  data-table-id=${id} class="btn btn-primary delete-all-option"><i class="fa fa-trash"></i></button>
</td>
</tr>`;
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
                  {!! Form::number('delivery_cost[0][min]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                <span>To</span>
                {!! Form::number('delivery_cost[0][max]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
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
          <button type="button" data-id="${count}" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
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
</table>`;
            count++
            $(".all-options").append(html);
            $("#myTabContent").append(html2);
        });
        $("body").on("click", ".add-new-ship-filed", function () {
            let data_id = $(this).attr("data-id");
            let data_options_count = parseInt($(this).attr("data-options-count")) + 1;
            $(this).attr("data-options-count", data_options_count);
            let delveriCost = "delivery_cost"
            let html = `<tr>
<td></td>
<td>
{!! Form::select('${delveriCost}[${data_id}][options][${data_options_count}][courier_id]',$active_couriers,null,['class'=>'form-control']) !!}
                </td>
                <td>
              {!! Form::number('${delveriCost}[${data_id}][options][${data_options_count}][cost]',null,['class'=>'form-control','min'=>'0', 'max'=>"99999.99",'step'=>'0.01']) !!}


                </td>
                <td>
                  {!! Form::text('${delveriCost}[${data_id}][options][${data_options_count}][time]',null,['class'=>'form-control','placeholder'=>'3 day']) !!}

                </td>
                <td colspan="2" class="text-right">
                   <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                </td>
             </tr>`;
            $(this)
                .closest("tbody")
                .find(".add-new-ship-filed-container")
                .before(html);
        });

        $(".geo-zones-submit").on("click", function (e) {
            e.preventDefault();
            let data = $("#geo-zones-form").serialize()
            postSendAjax($("#geo-zones-form").attr("action"), data, function (res) {
                console.log(1111)

                if (!res.error) {
//            location.replace(res.url)
                }
            }, function (err) {

                if (err.responseJSON.message) {
                    $(".error-place").empty()
                    $(".error-place").append(`<p> ${err.responseJSON.message}</p>`)
                    $(".error-place").show()
                }
            })
        })

    </script>
@stop