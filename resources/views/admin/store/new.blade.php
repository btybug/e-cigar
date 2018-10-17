@extends('layouts.admin')
@section('content-header')

    <div class="list-tabs-head">
        <div class="head">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
                <li><a data-toggle="tab" href="#price">Price</a></li>
                <li><a data-toggle="tab" href="#menu2">Tax& shippings</a></li>
                <li><a data-toggle="tab" href="#menu3">Related & Bundles</a></li>
            </ul>
        </div>
    </div>
@stop
@section('content')
    <div class="tab-content tabs_content">
        {!! Form::open(['url' => route('admin_new_post'), 'id' => 'post_form','files' => true]) !!}
        {!! Form::hidden('id',null) !!}
        <div id="home" class="tab-pane fade in active">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-danger btn-view">View Product</button>
                {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
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
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <ul class="nav nav-tabs tab_lang">
                                            <li class="active"><a data-toggle="tab" href="#infoAM">AM</a></li>
                                            <li><a data-toggle="tab" href="#infoEN">EN</a></li>
                                            <li><a data-toggle="tab" href="#infoRU">RU</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="tab-content">
                                            <div id="infoAM" class="tab-pane fade in active">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Info</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="info am">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="infoEN" class="tab-pane fade">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Info</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="info en">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="infoRU" class="tab-pane fade">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Info</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="info ru">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <div class="tab-content">
                                            <div id="infoAM" class="tab-pane fade in active">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Product Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Product Name AM">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="infoEN" class="tab-pane fade">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Product Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Product Name EN">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="infoRU" class="tab-pane fade">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Product Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Product Name RU">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="" id="" cols="30" rows="2"
                                                  placeholder="Description"></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="" id="" cols="30" rows="10"
                                                  placeholder="Description"></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Featured image</label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success">Image</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Gallery images</label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success">Image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="view-product-wall">
                        <div class="status-wall wall">
                            <div class="row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Published</option>
                                        <option value="">UnPublish</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tag-wall wall">
                            <div class="row">
                                <label class="col-sm-3">Tags</label>
                                <div class="col-sm-9">
                                    <input type="text" value="tag1" data-role="tagsinput" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="category-wall wall">
                            <h6>Category</h6>
                            <div class="cat-checkbox">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Parent</label>
                                </div>
                                <div class="child-checkbox">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Child1</label>
                                    </div>
                                </div>
                                <div class="child-checkbox">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Child2</label>
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Parent 2</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="price" class="tab-pane  fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="tab-discount">
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
                </div>

            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-3">Tax& shippings</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Tax& shippings">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-3">Related & Bundles</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Related & Bundles">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    {{--<link rel="stylesheet" href="{{asset('public/admin_theme/datetimepicker/bootstrap-datetimepicker.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    {{--<script src="{{asset('public/admin_theme/datetimepicker/moment.min.js')}}"></script>--}}
    {{--<script src="{{asset('public/admin_theme/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>--}}
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

            $('#tab-discount .date').datetimepicker({
            });

            discount_row++;
        }

        $('#tab-discount .date').datetimepicker({
            language: 'en-gb',
        });
        //--></script>
@stop