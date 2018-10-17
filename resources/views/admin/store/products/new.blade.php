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
        {!! Form::open(['url' => route('admin_store_new_product'), 'id' => 'post_form','files' => true]) !!}
        {!! Form::hidden('id',null) !!}
        <div id="home" class="tab-pane tab_info fade in active">
            <div class="text-right btn-save">
                <button type="button" class="btn btn-danger btn-view">View Product</button>
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
            <div class="row sortable-panels">
                <div class="col-md-9 ">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    @if(count(get_languages()))
                                        <ul class="nav nav-tabs tab_lang_horizontal">
                                            @foreach(get_languages() as $language)
                                                <li class="@if($loop->first) active @endif"><a data-toggle="tab"
                                                                                               href="#{{ strtolower($language->code) }}">
                                                        <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <div class="tab-content">
                                        @if(count(get_languages()))
                                            @foreach(get_languages() as $language)
                                                <div id="{{ strtolower($language->code) }}"
                                                     class="tab-pane fade  @if($loop->first) in active @endif">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        {!! Form::text('translatable['.strtolower($language->code).'][title]',get_translated($model,strtolower($language->code),'title'),['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Short Description</label>
                                                        {!! Form::textarea('translatable['.strtolower($language->code).'][short_description]',get_translated($model,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Long Description</label>
                                                        {!! Form::textarea('translatable['.strtolower($language->code).'][long_description]',get_translated($model,strtolower($language->code),'long_description'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-3">Featured image</label>
                                        <div class="col-sm-9">
                                            {{--{!! media_button('image') !!}--}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3">Gallery images</label>
                                        <div class="col-sm-9">
                                            {{--{!! media_button('gallery',null,true) !!}--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="view-product-wall">
                        <div class="author-wall wall">
                            <div class="row">
                                {{Form::label('author', 'Author',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {!! Form::select('user_id',$authors,null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="status-wall wall">
                            <div class="row">
                                {{Form::label('status', 'Status',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {!! Form::select('status',['published' => 'Published','draft' => 'Draft','pending' => 'Pending'],null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                    <!-- <div class="tag-wall wall">
                            <div class="row">
                                {{Form::label('tags', 'Tags',['class' => 'col-sm-3'])}}
                            <div class="col-sm-9">
{{Form::text('tags', null,['class' =>'form-control','id'=>'tags','data-role'=>'tagsinput'])}}
                            </div>
                        </div>
                    </div> -->
                        <div class="tag-wall wall">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-category"><span
                                            data-toggle="tooltip" title=""
                                            data-original-title="Choose all products under selected category.">Tags</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="" value="" placeholder="Tags"
                                           id="input-tags" class="form-control" autocomplete="off">
                                    <ul class="dropdown-menu"></ul>
                                    <div id="coupon-category" class="well well-sm view-coupon">
                                        <ul class="coupon-tags-list">
                                        </ul>
                                    </div>
                                    <input type="hidden" class="search-hidden-input" value="" id="tags-names">

                                </div>
                            </div>
                        </div>
                        <div class="category-wall wall">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-category"><span
                                            data-toggle="tooltip" title=""
                                            data-original-title="Choose all products under selected category.">Category</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="" value="" placeholder="Category"
                                           id="input-category" class="form-control" autocomplete="off">
                                    <ul class="dropdown-menu"></ul>
                                    <div id="coupon-category" class="well well-sm view-coupon">
                                        <ul class="coupon-category-list">
                                        </ul>
                                    </div>
                                    <input type="hidden" class="search-hidden-input" value="" id="category-names">

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

            $('#tab-discount .date').datetimepicker({});

            discount_row++;
        }

        $('#tab-discount .date').datetimepicker({
            language: 'en-gb',
        });
        //--></script>
@stop