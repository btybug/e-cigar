@extends('layouts.admin')
@section('content')
    <div class="stock-page">
        {!! Form::model($settings,[]) !!}
        <div class="card panel panel-default">
            <div class="card-header panel-heading clearfix">
                <h2 class="m-0 pull-left">Settings</h2>
                <div class="text-right btn-save pull-right">
                    <a href="{!! route('admin_tickets') !!}" class="btn btn-action btn-default">Back</a>
                    {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                </div>
            </div>

           <div class="card-body panel-body">
               <div class="row sortable-panels">
                   <div class="col-md-7 ">
                       <div class="form-group">
                           <div class="row">
                               <div class="col-sm-12">
                                   <div class="form-group">
                                       <div class="form-group">
                                           <label>Select status - Open ticket</label>
                                           {!! Form::select('open',$statuses->pluck('name', 'id'),null,['class'=>'form-control']) !!}
                                       </div>
                                       <div class="form-group">
                                           <label>Select status - Mark Completed</label>
                                           {!! Form::select('completed',$statuses->pluck('name', 'id'),null,['class'=>'form-control']) !!}
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
        {!! Form::close() !!}

    </div>

    @php
        $model=null;
        $type='tickets'
    @endphp
    <div class="inventory_attributes">
        <div class="card panel panel-default">
            <div class="card-header panel-heading">
                <div class="head-space-between">
                    <h2>{!! ucfirst(str_replace("_"," ",$type)) !!} Status</h2>
                    <div class="form-group row bord-top">
                        {!! Form::open(['url'=>route('post_admin_stock_statuses_manage')]) !!}
                        <input name="type" type="hidden" value="{!! $type !!}">
                        {{--<div class="col-md-8">--}}
                        {{--<input class="form-control new-oreder-input"  name="translatable[gb][name]" type="text">--}}
                        {{--</div>--}}
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary add-new-order" type="submit"><span class="icon-plus"><i
                                        class="fa fa-plus"></i></span>Add New
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="card-body panel-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-4  col-md-5 attributes-container">
                        <div class="mb-20 list-group">
                            @foreach($statuses as $status)
                                <div class="d-flex flex-wrap form-group row list-group-item bg-light  pointer"
                                     data-item-id="{!! $status->id !!}"
                                     data-parent-id="1">
                                    <div class="col-6 attr-option" data-item-id="{!! $status->id !!}">
                                        {!! ($status->name)??"Empty" !!}
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div
                                                style="width: 20px;height: 20px;background: {{ $status->color }}"></div>
                                            @if(!$status->is_default)
                                                {!! Form::model($status,['url' => route('post_admin_stock_statuses_delete')]) !!}
                                                {!! Form::hidden('id',null) !!}
                                                <button class="btn btn-sm btn-danger" type="submit"><i
                                                        class='fa fa-trash'></i></button>
                                                {!! Form::close() !!}
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{--<div class="form-group row bord-top">--}}
                        {{--{!! Form::open(['url'=>route('post_admin_stock_statuses_manage')]) !!}--}}
                        {{--<input name="type" type="hidden" value="{!! $type !!}">--}}
                        {{--<div class="col-md-8">--}}
                        {{--<input class="form-control new-oreder-input"  name="translatable[gb][name]" type="text">--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 text-right">--}}
                        {{--<button class="btn btn-primary add-new-order"  type="submit">Add </button>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--</div>--}}
                    </div>
                    <div class="col-xl-9 col-lg-8  col-md-7">
                        @include('admin.tools.statuses._patrials.status_form')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card panel panel-default">
        <div class="card-header panel-heading head-space-between">
            <h2>{!! ucfirst(str_replace("_"," ",'ticket')) !!} Category</h2>
            <div class="button-area text-right">
                <a class="btn btn-primary add-category" href="javascript:void(0)"><span class="icon-plus"><i class="fa fa-plus"></i></span>Add new</a>
            </div>
        </div>
        <div class="card-body panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div id="tree1"></div>
                </div>
                <div class="col-md-8">
                    <div class="content-area category-form-place">
                        <h4 class="text-center dddd">New Category</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="nav nav-tabs">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-colorselector/bootstrap-colorselector.min.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,888))}}">
    <link rel="stylesheet" href="https://mbraak.github.io/jqTree/jqtree.css">
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">--}}
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <style>
        .head-space-between{
            display: flex;
            justify-content: space-between;
        }
        .head-space-between h2{
            margin: 0;
        }
        .head-space-between .icon-plus{
            margin-right: 5px;
        }

        .del-save--btn {
            display: flex;
            justify-content: flex-end;
        }

        .del-save--btn .m-r-5 {
            margin-right: 5px;
        }

        #font-show-area {
            font-size: 50px;
            margin-top: 15px;
        }

        .category-form-place {
            padding: 15px;
            background-color: white;
            box-shadow: 0 0 4px #ccc;
        }

        #tree1 {
            background-color: #ffffff;
            border: 1px solid #ccc;
            box-shadow: 0 0 4px #ccc;
        }

        #tree1 ul.jqtree-tree li.jqtree-selected > .jqtree-element {
            padding: 10px 5px;
        }

        #tree1 ul.jqtree-tree .jqtree-element {
            padding: 10px 5px;
            border-bottom: 1px solid #ccc;
        }

        #tree1 ul.jqtree-tree .jqtree-title {
            outline: none;
        }

        #tree1 ul.jqtree-tree .jqtree-toggler {
            color: #3c8dbc;
        }

        .category-form-place .mt-10 {
            margin-top: 10px;
        }
    </style>
@stop

@section("js")
    <script src="{{asset('public/admin_theme/bootstrap-colorselector/bootstrap-colorselector.min.js')}}"></script>
    <script src="https://mbraak.github.io/jqTree/tree.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script>
        $(function () {
//            $('#colorselector_2').colorselector({
//                callback : function(value, color, title) {
//                    $("#colorValue").val(value);
//                    $("#colorColor").val(color);
//                    $("#colorTitle").val(title);
//                }
//            });
            $('#colorselector_2').colorselector();

        });
    </script>
    <script>
        $("body").on("click", ".attr-option", function (e) {
            e.preventDefault()
            let id = $(this).attr("data-item-id")
            AjaxCall("{!! route('post_admin_stock_statuses_manage_form') !!}", {id}, function (res) {
                if (!res.error) {
                    $("body").find(".options-form").html(res.html)
                    $('#colorselector_2').colorselector();
                }
            })
        });

    </script>
    <script>
        $('body').on('click', '.del-save--btn .btn-submit-form', function () {
            $('.category-form-place .updated-form').submit()
        })
        $("#select-stickers").select2();
        $("body").on('click', '.add-category', function () {
            AjaxCall("/admin/tools/categories/get-form/stocks", {id: null}, function (res) {
                if (!res.error) {
                    $(".category-form-place").html(res.html);
                    $('.icon-picker').iconpicker();
                    $("#select-stickers").select2();
                }
            });
        });


        $("body").on("click", ".iconpicker-item", function () {
            let value = $(".icon-picker").val()
            $("#font-show-area").attr("class", value)
        })
        window.AjaxCall = function postSendAjax(url, data, success, error) {
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                datatype: "json",
                data: data,
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    if (success) {
                        success(data);
                    }
                    return data;
                },
                error: function (errorThrown) {
                    if (error) {
                        error(errorThrown);
                    }
                    return errorThrown;
                }
            });
        };

        var data = {!! json_encode(\App\Models\Category::recursiveItems($categories),true) !!};

        $("#tree1").tree({
            data: data,
            autoOpen: true,
            saveState: true,
            dragAndDrop: true,
            onDragStop: function (e, node) {
                let id = e.id
                let parentId = e.parent.id
                AjaxCall("/admin/tools/filters/update-parent", {id, parentId}, function (res) {
                    $(".category-form-place").html('');
                });
            }
        });

        $("#tree1").bind("tree.click", function (e) {
            AjaxCall("/admin/tools/categories/get-form/stocks", {id: e.node.id}, function (res) {
                if (!res.error) {
                    $(".category-form-place").html(res.html);
                    $('.icon-picker').iconpicker();
                    $("#select-stickers").select2();

                }
            });
        });
    </script>
@stop
