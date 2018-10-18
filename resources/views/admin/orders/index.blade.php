@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Orders</h2></div>
            <div class="col-md-6">
                <div class="pull-right">
                    <a class="btn btn-info" href="{!! route('admin_orders_new') !!}">Add new</a>
                    <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="Print Invoice"><i class="fa fa-print"></i></a>
                    <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="Print Shipping List"><i class="fa fa-truck"></i></a>
                    <a href="https://demo.opencart.com/admin/index.php?route=sale/order&amp;user_token=qrdym7jfe8IAJBo84RMx4PEZ9O2lQxml" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a>
                </div>
            </div>

    {{--<div class="row">--}}
        {{--<div class="col-xs-12">--}}
            {{--<div class="col-md-6 pull-left"><h2>Orders</h2></div>--}}
            {{--<div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_blog_create') !!}">Add new</a></div>--}}
        {{--</div>--}}
        {{--<div class="col-xs-12">--}}
            {{--<table id="categories-table" class="table table-style table-bordered" cellspacing="0" width="100%">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>#</th>--}}
                    {{--<th>Title</th>--}}
                    {{--<th>Long Description</th>--}}
                    {{--<th>Short Description</th>--}}
                    {{--<th>Image</th>--}}
                    {{--<th>Added/Last Modified Date</th>--}}
                    {{--<th>Actions</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-md-8">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" aria-expanded="true">Order Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="seeOrder-tab" data-toggle="tab" href="#seeOrder" role="tab" aria-controls="seeOrder" aria-selected="false">See Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="editOrder-tab" data-toggle="tab" href="#editOrder" role="tab" aria-controls="editOrder" aria-selected="false">Edit Order</a>
                </li>
            </ul>
            <div class="tab-content tab-content-store-settings">
                <div class="tab-pane fade active in" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Order Details</h3>
                        </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Store"><i class="fa fa-shopping-cart fa-fw"></i></button></td>
                                <td><a href="https://demo.opencart.com/" target="_blank">Your Store</a></td>
                            </tr>
                            <tr>
                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Date Added"><i class="fa fa-calendar fa-fw"></i></button></td>
                                <td>17/10/2018</td>
                            </tr>
                            <tr>
                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Payment Method"><i class="fa fa-credit-card fa-fw"></i></button></td>
                                <td>Cash On Delivery</td>
                            </tr>
                            <tr>
                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Shipping Method"><i class="fa fa-truck fa-fw"></i></button></td>
                                <td>Flat Shipping Rate</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Customer Details</h3>
                        </div>
                        <table class="table">
                            <tbody><tr>
                                <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Customer"><i class="fa fa-user fa-fw"></i></button></td>
                                <td> sddc sdvdsvc
                                </td>
                            </tr>
                            <tr>
                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Customer Group"><i class="fa fa-group fa-fw"></i></button></td>
                                <td>Default</td>
                            </tr>
                            <tr>
                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="E-Mail"><i class="fa fa-envelope-o fa-fw"></i></button></td>
                                <td><a href="mailto:focusbenj@gmail.com">focusbenj@gmail.com</a></td>
                            </tr>
                            <tr>
                                <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Telephone"><i class="fa fa-phone fa-fw"></i></button></td>
                                <td>08069386824</td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
                <div class="tab-pane tabe-pane--see-order fade" id="seeOrder" role="tabpanel" aria-labelledby="seeOrder-tab">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-info-circle"></i> Order (#3875)</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td style="width: 50%;" class="text-left">Payment Address</td>
                                    <td style="width: 50%;" class="text-left">Shipping Address</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left">sddc sdvdsvc<br>22esdwd<br>dcac 12134<br>Lagos<br>Nigeria</td>
                                    <td class="text-left">sddc sdvdsvc<br>22esdwd<br>dcac 12134<br>Lagos<br>Nigeria</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td class="text-left">Product</td>
                                    <td class="text-left">Model</td>
                                    <td class="text-right">Quantity</td>
                                    <td class="text-right">Unit Price</td>
                                    <td class="text-right">Total</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=JPnmap7USFKyzfmD7yYORAxSA4BCoOZx&amp;product_id=47">HP LP3065</a> <br>
                                        &nbsp;<small> - Delivery Date: 2011-04-22</small> </td>
                                    <td class="text-left">Product 21</td>
                                    <td class="text-right">1</td>
                                    <td class="text-right">$100.00</td>
                                    <td class="text-right">$100.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Sub-Total</td>
                                    <td class="text-right">$100.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Flat Shipping Rate</td>
                                    <td class="text-right">$5.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Total</td>
                                    <td class="text-right">$105.00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane tabe-pane--edit-order fade" id="editOrder" role="tabpanel" aria-labelledby="editOrder-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" id="customerDtls-tab" data-toggle="tab" href="#customerDtls" role="tab" aria-controls="customerDtls" aria-selected="true" aria-expanded="true">1. Customer Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="products-tab" data-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="false">2. Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="paymentDtls-tab" data-toggle="tab" href="#paymentDtls" role="tab" aria-controls="paymentDtls" aria-selected="false">3. Payment Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="shippingDtls-tab" data-toggle="tab" href="#shippingDtls" role="tab" aria-controls="shippingDtls" aria-selected="false">4. Shipping Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="totals-tab" data-toggle="tab" href="#totals" role="tab" aria-controls="totals" aria-selected="false">5. Totals</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-content-store-settings">
                        <div class="tab-pane fade active in" id="customerDtls" role="tabpanel" aria-labelledby="customerDtls-tab">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-store">Store</label>
                                <div class="col-sm-10">
                                    <select name="store_id" id="input-store" class="form-control">
                                        <option value="0" selected="selected">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-error">
                                <label class="col-sm-2 control-label" for="input-currency">Currency</label>
                                <div class="col-sm-10">
                                    <select name="currency" id="input-currency" class="form-control">
                                        <option value="EUR">Euro</option>
                                        <option value="GBP">Pound Sterling</option>
                                        <option value="USD" selected="selected">US Dollar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-customer">Customer</label>
                                <div class="col-sm-10">
                                    <input type="text" name="customer" value="" placeholder="Customer" id="input-customer" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                                    <input type="hidden" name="customer_id" value="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-customer-group">Customer Group</label>
                                <div class="col-sm-10">
                                    <select name="customer_group_id" id="input-customer-group" class="form-control">
                                        <option value="1" selected="selected">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstname" value="sddc" id="input-firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastname" value="sdvdsvc" id="input-lastname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" value="focusbenj@gmail.com" id="input-email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="telephone" value="08069386824" id="input-telephone" class="form-control">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" id="button-customer" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-arrow-right"></i> Continue</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                            Edit products fields
                        </div>
                        <div class="tab-pane fade" id="paymentDtls" role="tabpanel" aria-labelledby="paymentDtls-tab">
                            Edit Payment Details fields
                        </div>
                        <div class="tab-pane fade" id="shippingDtls" role="tabpanel" aria-labelledby="shippingDtls-tab">
                            Edit Shipping Details fields
                        </div>
                        <div class="tab-pane fade" id="totals" role="tabpanel" aria-labelledby="totals-tab">
                            Edit Totals fields
                        </div>
                    </div>


                </div>

            </div>




        </div>
        <div class="col-md-2" style="border-left: 2px solid #ddd; height: 868px; overflow: auto">
            {{--<h3 style="color: red">"Here comes order actions column"</h3>--}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Order Actions</h3>
                </div>
            </div>
            <select id="OrderActions" class="form-control">
                <option selected>Actions</option>
                <option>New Order</option>
                <option>Cancelled Order</option>
                <option>Processing Order</option>
                <option>Completed Order</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            {{--<h3 style="color: red">"Here comes order notes column"</h3>--}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Order Notes</h3>
                </div>
                <div class="order-notes">
                    <div style="border-left: 2px solid #ddd; height: 500px; overflow: auto">
                        <div class="status-outer">
                            <div class="status">
                                <p>Order status changed from processing to Processing.</p>
                            </div>
                            <div class="added d-flex">
                                <span>added on October 15 2018 at 5:33 am by Abokamal</span>
                                <button class="btn btn-primary">
                                    <i>Delete Note</i>
                                </button>
                            </div>
                        </div>
                        <div class="status-outer">
                            <div class="status">
                                <p>Order status changed from On Hold to Processing.</p>
                            </div>
                            <div class="added d-flex">
                                <span>added on October 15 2018 at 5:33 am by Abokamal</span>
                                <button class="btn btn-primary">
                                    <i>Delete Note</i>
                                </button>
                            </div>
                        </div>
                        <div class="status-outer">
                            <div class="status1">
                                <p>Awaiting BACS payment Order status changed from Pending Payment to On Hold.</p>
                            </div>
                            <div class="added d-flex">
                                <span>added on October 15 2018 at 5:33 am by Haseeb</span>
                                <button class="btn btn-primary">
                                    <i>Delete Note</i>
                                </button>
                            </div>
                        </div>
                        <div class="status-outer">
                            <div class="status1">
                                <p>Barcode generated successfully: <em>http://ukprintplus.co.uk/? ws barcode=10530</em></p>
                            </div>
                            <div class="added d-flex" style=" border-bottom: 1px solid gainsboro; padding-bottom: 20px;">
                                <span>added on October 15 2018 at 5:33 am by Haseeb</span>
                                <button class="btn btn-primary">
                                    <i>Delete Note</i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="add-note">
                        <h6>Add note</h6>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-outline-secondary">Costumer Note</button>
                            <button class="btn btn-outline-secondary ml-2">Add</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>






@stop
@section('js')
    <script>
        $(function () {
            {{--$('#categories-table').DataTable({--}}
            {{--ajax:  "{!! route('datatable_all_categories') !!}",--}}
            {{--"processing": true,--}}
            {{--"serverSide": true,--}}
            {{--"bPaginate": true,--}}
            {{--columns: [--}}
            {{--{data: 'id',name: 'id'},--}}
            {{--{data: 'name', name: 'name'},--}}
            {{--{data: 'description',name: 'description'},--}}
            {{--{data: 'image', name: 'image'},--}}
            {{--{data: 'icon', name: 'icon'},--}}
            {{--{data: 'created_at', name: 'created_at'}--}}
            {{--]--}}
            {{--});--}}
        });

    </script>
@stop