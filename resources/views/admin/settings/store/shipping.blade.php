@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link" id="general-tab"  href="{!! route('admin_settings_store') !!}" role="tab" aria-controls="general" aria-selected="true" aria-expanded="true">General</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="shipping-tab"  href="{!! route('admin_settings_shipping') !!}" role="tab" aria-controls="shipping" aria-selected="false">Shipping</a>
            </li>
        </ul>
        <div class="" id="myTabContent">
            <div class="">
                <table id="discount" class="table table-responsive table--store-settings">
                    <tbody class="all-options">
                    <tr>
                        <td>
                            <label for="ShippingZones">Shipping to</label>
                        </td>
                        <td>
                            <select id="ShippingZones" class="form-control">
                                <option selected>Shipping Zones</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-primary add-new-option"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-responsive table--store-settings">
                    <tbody>
                    <tr class="bg-my-light-blue">
                        <td>Shipping Zone - <span>Armenia</span></td>
                        <td colspan="5">Tax Rate - <span>ArmeniaVaT20</span></td>
                    </tr>
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
                    <tfoot>

                    <tr>
                        <td colspan="6" class="text-right">
                            <button type="button" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center table--store-settings_add-options add-new-ship-filed">
                            <span><i class="fa fa-plus"></i></span> Add more option
                        </td>
                    </tr>


                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop