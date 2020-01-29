@extends('layouts.admin',['activePage'=>'staff'])
@section("css")
    <link rel="stylesheet" href="https://mbraak.github.io/jqTree/jqtree.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/css/fontawesome-iconpicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <style>
        .head-space-between {
            display: flex;
            justify-content: space-between;
        }

        .head-space-between h2 {
            margin: 0;
        }

        .head-space-between .icon-plus {
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
            /*padding: 15px;*/
            box-shadow: 0 0 1px #ccc;
        }

        #tree1 {

            /*border: 1px solid #ccc;*/
            box-shadow: 0 0 1px #ccc;
        }

        #tree1 ul.jqtree-tree li.jqtree-selected > .jqtree-element, #tree1 ul.jqtree-tree li.jqtree-selected > .jqtree-element:hover {
            text-shadow: none !important;
            background: linear-gradient(60deg, #7b1fa2, #913f9e) !important;
        }

        ul.jqtree-tree .jqtree-title.jqtree-title-folder {
            color: #000000 !important;
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
            color: #000000 !important;
        }

        #tree1 ul.jqtree-tree .jqtree-toggler {
            color: #ff0913;
        }

        .category-form-place .mt-10 {
            margin-top: 10px;
        }
    </style>
@stop
@section('content')
    <div class="d-flex flex-wrap justify-content-between w-100 admin-general--tabs-wrapper">
        <ul class="nav nav-tabs new-main-admin--tabs mb-3 admin-general--tabs">
            @foreach($warehouses as $key=>$warehouse)
                <li class="nav-item">
                    <a class="nav-link @if($q ==$key)active @endif"   href="{!! route('admin_app_locations',$key) !!}">{!! $warehouse !!}</a>
                </li>
            @endforeach

        </ul>
        <div class="button-area mr-4">
            <a class="btn btn-info add-category" href="javascript:void(0)"><span class="icon-plus mr-1"><i
                        class="fa fa-plus"></i></span>Add new</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="row">
                        <div class="col-md-4">
                            <div id="tree1"></div>
                        </div>
                        <div class="col-md-8">
                            <div class="content-area category-form-place">
                                {{--                                @include('admin.store.categories.create_or_update')--}}
                                <h4 class="text-center">New Category</h4>
                            </div>
                            <div class="content-area item-form-place">

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade releted-products-add-modal" id="productsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select products</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <ul class="all-list">

                    </ul>
                </div>
                {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                {{--</div>--}}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@stop

@section('js')
    <script src="https://mbraak.github.io/jqTree/tree.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
    <script>
        $('body').on('click', '.del-save--btn .btn-submit-form', function () {
            $('.category-form-place .updated-form').submit()
        });


        $("#select-stickers").select2();

        $("body").on('click', '.add-category', function () {

            AjaxCall("{{ route('admin_app_locations_form',$model->id )}}", {id: null}, function (res) {
                if (!res.error) {
                    $(".category-form-place").html(res.html);
                    $('.icon-picker').iconpicker();
                    $("#select-stickers").select2();
                }
            });
        });


        $('.icon-picker').iconpicker();
        $("body").on("click", ".iconpicker-item", function () {
            let value = $(".icon-picker").val();
            $("#font-show-area").attr("class", value)
        });
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

        var data = {!! json_encode(\App\Models\WarehouseRacks::recursiveItems($racks),true) !!};

        $("#tree1").tree({
            data: data,
            autoOpen: true,
            saveState: true,
            dragAndDrop: true,
            onDragStop: function (e, node) {
                let id = e.id;
                let parentId = e.parent.id;
                AjaxCall("/admin/inventory/warehouses/update-parent", {id, parentId}, function (res) {
                    $(".category-form-place").html('');
                });
            }
        });

        $("#tree1").bind("tree.click", function (e) {
            AjaxCall("{{ route('admin_app_locations_form',$model->id )}}", {id: e.node.id}, function (res) {
                if (!res.error) {
                    $(".category-form-place").html(res.html);
                    $(".item-form-place").html(res.itemHtml);
                    $('.icon-picker').iconpicker();
                    $("#select-stickers").select2();

                }
            });
        });
    </script>
@stop
