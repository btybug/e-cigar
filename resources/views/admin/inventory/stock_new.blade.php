@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <section class="content-header">
        <h1> Admin Profile </h1>
        <ol class="breadcrumb">
            <li><a href="http://demo0.laravelcommerce.com/admin/dashboard/this_month"><i class="fa fa-dashboard"></i>
                    Dashboard</a></li>
            <li class="active">Admin Profile</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary mar-0">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="http://demo0.laravelcommerce.com/resources/views/admin/images/admin_profile/1539074891.42792796_2710973195795309_228747741981835264_n.png"
                             alt="Václav profile picture">

                        <h3 class="profile-username text-center">Václav Kutiš</h3>

                        <p class="text-muted text-center">Administrator</p>

                        <!-- <ul class="list-group list-group-unbordered">
                           <li class="list-group-item">
                             <b>Followers</b> <a class="pull-right">1,322</a>
                           </li>
                           <li class="list-group-item">
                             <b>Following</b> <a class="pull-right">543</a>
                           </li>
                           <li class="list-group-item">
                             <b>Friends</b> <a class="pull-right">13,287</a>
                           </li>
                         </ul>

                         <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <div class="col-md-12">
                <ul class="nav nav-tabs admin-profile-left">
                    <li class="active"><a data-toggle="tab" href="#basic">Basic Details</a></li>
                    <li><a data-toggle="tab" href="#media">Media</a></li>
                    <li><a data-toggle="tab" href="#attributes">Attributes</a></li>
                    <li><a data-toggle="tab" href="#logistic">Logistic</a></li>
                    <li><a data-toggle="tab" href="#price">Price</a></li>
                    <li><a data-toggle="tab" href="#variations">Variations</a></li>
                </ul>
            </div>

            <!-- /.col -->
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="basic" class="tab-pane fade basic-details-tab in active">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="basic-center basic-wall">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="" class="form-horizontal">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="product_name" class="control-label col-sm-4">Product
                                                                name</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" name="product_name"
                                                                       id="product_name" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="product_id" class="control-label col-sm-4">Product
                                                                ID</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" name="product_id"
                                                                       id="product_id" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="sku" class="control-label col-sm-4">SKU</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" name="sku" id="sku"
                                                                       type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="sku"
                                                                   class="control-label col-sm-4">Barcode</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-control">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="media" class="tab-pane basic-details-tab fade">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list">
                                            <ul>
                                                <li><a href="#">Feature image</a></li>
                                                <li><a href="#">Other images</a></li>
                                                <li><a href="#">Videos</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="basic-center basic-wall">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="basic-right basic-wall">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="attributes" class="tab-pane basic-details-tab fade">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list">
                                            <ul class="get-all-attributes-tab">

                                            </ul>
                                        </div>
                                        <div class="button-add text-center">
                                            <a href="#" class="btn btn-info btn-block get-all-attributes-tab-event"><i class="fa fa-plus"></i>Add new
                                                option</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="basic-center basic-wall">
                                        <ul class="choset-attributes">


                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="basic-right basic-wall">
                                        <ul class="list-attributes-options">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="logistic" class="tab-pane basic-details-tab stock-new-tab fade">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="basic-left basic-wall">
                                        <form action="" class="form-horizontal">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="warehouse" class="control-label col-sm-4">Warehouse</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="warehouse"
                                                                           id="warehouse" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="quantity" class="control-label col-sm-4">Quantity</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="quantity"
                                                                           id="quantity" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="quantity_alert"
                                                                       class="control-label col-sm-4">Quantity
                                                                    Alert</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="quantity_alert"
                                                                           id="quantity_alert" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="shipping_notes"
                                                                       class="control-label col-sm-4">Shipping
                                                                    Notes</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="shipping_notes"
                                                                           id="shipping_notes" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="warnings" class="control-label col-sm-4">Warnings</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="warnings"
                                                                           id="warnings" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset>
                                                            <legend>Packaging Size</legend>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="packaging_length"
                                                                           class="control-label col-sm-4">Length</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control"
                                                                               name="packaging_length"
                                                                               id="packaging_length" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="packaging_width"
                                                                           class="control-label col-sm-4">Width</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control"
                                                                               name="packaging_width"
                                                                               id="packaging_width" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="packaging_height"
                                                                           class="control-label col-sm-4">Height</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control"
                                                                               name="packaging_height"
                                                                               id="packaging_height" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="packaging_weight"
                                                                           class="control-label col-sm-4">Weight</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control"
                                                                               name="packaging_weight"
                                                                               id="packaging_weight" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="basic-right basic-wall logistic-right">
                                        <div class="head">
                                            <h4>Order Request</h4>
                                        </div>
                                        <div class="logistic-right-content">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="logistic-quantity" class="control-label col-sm-4">Quantity</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="logistic-quantity" id="logistic-quantity" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sumbit-logistic text-right">
                                            <input type="submit" value="Submit" class="btn btn-info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="price" class="tab-pane stock-price-tab fade">
                        <div class="table-responsive">
                            <table id="discount" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">Customer Group</td>
                                    <td class="text-right">Quantity</td>
                                    <td class="text-right">Priority</td>
                                    <td class="text-right">Price</td>
                                    <td class="text-left">Date Start</td>
                                    <td class="text-left">Date End</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id="discount-row0">
                                    <td class="text-left"><select name="product_discount[0][customer_group_id]"
                                                                  class="form-control">
                                            <option value="1" selected="selected">Default</option>
                                        </select></td>
                                    <td class="text-right"><input type="text"
                                                                  name="product_discount[0][quantity]"
                                                                  value="10" placeholder="Quantity"
                                                                  class="form-control"/></td>
                                    <td class="text-right"><input type="text"
                                                                  name="product_discount[0][priority]" value="1"
                                                                  placeholder="Priority" class="form-control"/>
                                    </td>
                                    <td class="text-right"><input type="text" name="product_discount[0][price]"
                                                                  value="88.0000" placeholder="Price"
                                                                  class="form-control"/></td>
                                    <td class="text-left" style="width: 20%;">
                                        <div class="input-group ">
                                            <input type="text" name="product_discount[0][date_start]" value=""
                                                   placeholder="Date Start" data-date-format="YYYY-MM-DD"
                                                   class="form-control date"/>
                                            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
</span></div>
                                    </td>
                                    <td class="text-left" style="width: 20%;">
                                        <div class="input-group ">
                                            <input type="text" name="product_discount[0][date_end]" value=""
                                                   placeholder="Date End" data-date-format="YYYY-MM-DD"
                                                   class="form-control date"/>
                                            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
</span></div>
                                    </td>
                                    <td class="text-left">
                                        <button type="button" onclick="$('#discount-row0').remove();"
                                                data-toggle="tooltip" title="Remove" class="btn btn-danger"><i
                                                    class="fa fa-minus-circle"></i></button>
                                    </td>
                                </tr>
                                <tr id="discount-row1">
                                    <td class="text-left"><select name="product_discount[1][customer_group_id]"
                                                                  class="form-control">
                                            <option value="1" selected="selected">Default</option>
                                        </select></td>
                                    <td class="text-right"><input type="text"
                                                                  name="product_discount[1][quantity]"
                                                                  value="20" placeholder="Quantity"
                                                                  class="form-control"/></td>
                                    <td class="text-right"><input type="text"
                                                                  name="product_discount[1][priority]" value="1"
                                                                  placeholder="Priority" class="form-control"/>
                                    </td>
                                    <td class="text-right"><input type="text" name="product_discount[1][price]"
                                                                  value="77.0000" placeholder="Price"
                                                                  class="form-control"/></td>
                                    <td class="text-left" style="width: 20%;">
                                        <div class="input-group ">
                                            <input type="text" name="product_discount[1][date_start]" value=""
                                                   placeholder="Date Start" data-date-format="YYYY-MM-DD"
                                                   class="form-control date"/>
                                            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
</span></div>
                                    </td>
                                    <td class="text-left" style="width: 20%;">
                                        <div class="input-group ">
                                            <input type="text" name="product_discount[1][date_end]" value=""
                                                   placeholder="Date End" data-date-format="YYYY-MM-DD"
                                                   class="form-control date"/>
                                            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
</span></div>
                                    </td>
                                    <td class="text-left">
                                        <button type="button" onclick="$('#discount-row1').remove();"
                                                data-toggle="tooltip" title="Remove" class="btn btn-danger"><i
                                                    class="fa fa-minus-circle"></i></button>
                                    </td>
                                </tr>
                                <tr id="discount-row2">
                                    <td class="text-left"><select name="product_discount[2][customer_group_id]"
                                                                  class="form-control">
                                            <option value="1" selected="selected">Default</option>
                                        </select></td>
                                    <td class="text-right"><input type="text"
                                                                  name="product_discount[2][quantity]"
                                                                  value="30" placeholder="Quantity"
                                                                  class="form-control"/></td>
                                    <td class="text-right"><input type="text"
                                                                  name="product_discount[2][priority]" value="1"
                                                                  placeholder="Priority" class="form-control"/>
                                    </td>
                                    <td class="text-right"><input type="text" name="product_discount[2][price]"
                                                                  value="66.0000" placeholder="Price"
                                                                  class="form-control"/></td>
                                    <td class="text-left" style="width: 20%;">
                                        <div class="input-group ">
                                            <input type="text" name="product_discount[2][date_start]" value=""
                                                   placeholder="Date Start" data-date-format="YYYY-MM-DD"
                                                   class="form-control date"/>
                                            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
</span></div>
                                    </td>
                                    <td class="text-left" style="width: 20%;">
                                        <div class="input-group ">
                                            <input type="text" name="product_discount[2][date_end]" value=""
                                                   placeholder="Date End" data-date-format="YYYY-MM-DD"
                                                   class="form-control date"/>
                                            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
</span></div>
                                    </td>
                                    <td class="text-left">
                                        <button type="button" onclick="$('#discount-row2').remove();"
                                                data-toggle="tooltip" title="Remove" class="btn btn-danger"><i
                                                    class="fa fa-minus-circle"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6"></td>
                                    <td class="text-left">
                                        <button type="button" onclick="addDiscount();" data-toggle="tooltip"
                                                title="Add Discount" class="btn btn-primary"><i
                                                    class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div id="variations" class="tab-pane basic-details-tab stock-variations-tab fade">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list-attrs" style="min-height:300px;">
                                            <ul class="attribute-list-items">

                                            </ul>
                                        </div>
                                        <div class="button-add text-center">
                                            <a href="#" class="btn btn-info btn-block get-all-attributes"><i class="fa fa-plus"></i>Add new
                                                option</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="table-responsive variations-table">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

    <div class="modal fade" id="attributesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Options</h4>
                </div>
                <div class="modal-body">
                    <div class="all-list">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script>

        $("body").on("click", ".get-all-attributes-tab-event", function () {
            let arr = []
            $(".get-all-attributes-tab").children().each(function(){
                arr.push($(this).attr("data-id"))
            })
            AjaxCall("/admin/inventory/attributes/get-all", {arr}, function (res) {
                if (!res.error) {
                    $("#attributesModal .modal-body .all-list").empty();
                    res.data.forEach(item => {
                        let html = `  <li data-id="${item.id}" class="option-elm-modal"><a
                                                href="#">${item.name}</a> <a class="btn btn-primary add-attribute-event" data-id="${item.id}">ADD</a></li>`
                        $("#attributesModal .modal-body .all-list").append(html)
                    });
                    $("#attributesModal").modal();
                }
            })
        });

        $("body").on("click", ".add-attribute-event", function () {
            let id = $(this).data('id')
            AjaxCall("/admin/inventory/attributes/get-attribute", {id:id}, function (res) {
                if (!res.error) {
                    $(".get-all-attributes-tab").append(`<li data-id="${res.data.id}" class="option-elm-attributes"><a
                                                href="#">${res.data.name}</a></li>`);
                }
            })
            $(this).parent().remove()
        });


        $("body").on("click", ".get-all-attributes", function () {
            let arr = []
            $(".attribute-list-items").children().each(function(){
                arr.push($(this).attr("data-id"))
            })
            AjaxCall("/admin/inventory/attributes/get-all", {arr}, function (res) {
                if (!res.error) {
                    $("#attributesModal .modal-body .all-list").empty();
                    res.data.forEach(item => {
                        let html = `  <li data-id="${item.id}" class="option-elm-modal"><a
                                                href="#">${item.name}</a> <a class="btn btn-primary add-attribute" data-id="${item.id}">ADD</a></li>`
                        $("#attributesModal .modal-body .all-list").append(html)
                    });
                    $("#attributesModal").modal();
                }
            })
        });

        $("body").on("click", ".add-attribute", function () {
            let id = $(this).data('id')
            AjaxCall("/admin/inventory/attributes/get-attribute", {id:id}, function (res) {
                if (!res.error) {
                    $(".attribute-list-items").append(`<li data-id="${res.data.id}" class="option-elm-variations"><a
                                                href="#">${res.data.name}</a></li>`);
                }
            })
            $(this).parent().remove()
        });

        $("body").on("click", ".option-elm-attributes", function () {
            let id = $(this).attr("data-id")
            AjaxCall("/admin/inventory/attributes/get-options-by-id", {id}, function (res) {
                if (!res.error) {
                    $(".list-attributes-options").empty()
                    res.data.forEach(item => {
                        let html = `<li class="badge attributes-item"><a href="#">${item.name}</a></li>`
                        $(".list-attributes-options"
                ).
                    append(html)
                })
                }
            })
        });
        
        $("body").on("click", ".option-elm-variations", function () {
            let id = $(this).attr("data-id")
            AjaxCall("/admin/inventory/attributes/get-variations-table", {id}, function (res) {
                if (!res.error) {
                    $(".variations-table").empty().append(res.html)
                }
            })
        });

        $("body").on("click", ".attributes-item", function () {
            // AJax petqa
            let text = $(this).children().text()

            $(".choset-attributes").append(`<li>${text} <span class="restore-item"><i class="fa fa-trash"></i></span> </li>`)
            $(this).remove()
        })

        $("body").on("click", ".restore-item", function () {
            let text = $(this).parent().text()
            $(this).parent().remove()
            let html = `<li class="badge attributes-item"><a href="#">${text}</a></li>`
            $(".list").append(html)
        })

    </script>
    <script type="text/javascript"><!--
        var discount_row = 3;

        function addDiscount() {
            html = '<tr id="discount-row' + discount_row + '">';
            html += '  <td class="text-left"><select name="product_discount[' + discount_row + '][customer_group_id]" class="form-control">';
            html += '    <option value="1">Default</option>';
            html += '  </select></td>';
            html += '  <td class="text-right"><input type="text" name="product_discount[' + discount_row + '][quantity]" value="" placeholder="Quantity" class="form-control" /></td>';
            html += '  <td class="text-right"><input type="text" name="product_discount[' + discount_row + '][priority]" value="" placeholder="Priority" class="form-control" /></td>';
            html += '  <td class="text-right"><input type="text" name="product_discount[' + discount_row + '][price]" value="" placeholder="Price" class="form-control" /></td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group "><input type="text" name="product_discount[' + discount_row + '][date_start]" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control date" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group "><input type="text" name="product_discount[' + discount_row + '][date_end]" value="" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control date" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
            html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#discount tbody').append(html);

            $('#tab-discount .date').datetimepicker({});

            discount_row++;
        }

        $('#tab-discount .date').datetimepicker({
            language: 'en-gb',
        });
        //--></script>
@stop