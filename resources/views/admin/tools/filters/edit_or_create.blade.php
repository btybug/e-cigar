@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="col-md-12">
        <div class="card panel panel-default">
            <div class="card-header panel-heading head-space-between">
                <div class="form-group row mt-10">
                    <div class="col-md-10">
                        {!! Form::text('title',null,['class'=>'form-control','required'=>true,'placeholder'=>'Filter Name']) !!}
                    </div>

                </div>
                <div class="button-area text-right">
                    <div class="form-group">
                        {!! Form::submit('Save',['class' => 'btn btn-primary btn-submit-form']) !!}
                    </div>
                </div>
            </div>
            <div class="card-body panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div id="tree1"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="content-area filter-form-place">
                            @include('admin.tools.filters.create_or_update',['model'=>null])
                            <h4 class="text-center dddd">New Filter</h4>
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
@section('js')
    <script src="https://mbraak.github.io/jqTree/tree.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script>
        {{--var data = {!! json_encode(\App\Models\Filters::recursiveItems($filters),true) !!};--}}
        {{--$("#tree1").tree({--}}
            {{--data: data,--}}
            {{--autoOpen: true,--}}
            {{--saveState: true,--}}
        {{--});--}}
        $('body').on('click', '.del-save--btn .btn-submit-form', function () {
            $('.filter-form-place .updated-form').submit()
        });
        $("body").on('click', '.add-filter', function () {
            AjaxCall("{!! route('admin_tools_filters_form') !!}", {id: null}, function (res) {
                if (!res.error) {
                    $(".filter-form-place").html(res.html);
                    $('.icon-picker').iconpicker();
                    $("#select-stickers").select2();
                }
            });
        });

        $("#tree1").bind("tree.click", function (e) {
            AjaxCall("{!! route('admin_tools_filters_form') !!}", {id: e.node.id}, function (res) {
                if (!res.error) {
                    $(".filter-form-place").html(res.html);
                    $('.icon-picker').iconpicker();
                    $("#select-stickers").select2();

                }
            });
        });
        $("body").on('click', '.select-products', function () {
            let arr = [];
            AjaxCall("{!! route('admin_tools_filters_get_items') !!}", {arr}, function (res) {
                if (!res.error) {
                    $("#productsModal .modal-body .all-list").empty();
                    res.data.forEach(item => {
                        let html = `<li data-id="${item.id}" class="option-elm-modal"><div><a
                                                href="#">${item.name}
                                                </a> <a class="btn btn-primary add-attribute-event" data-name="${item.name}"
                                                data-id="${item.id}">ADD</a></div></li>`;
                        $("#productsModal .modal-body .all-list").append(html);
                    });
                    $("#productsModal").modal();
                }
            });
        });
        $("body").on("click", ".add-attribute-event", function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            $(".get-all-attributes-tab")
                .append(`<li  data-id="${id}" class="option-elm-attributes col-md-3"><div class="wrap-item"><a
                                href="#">
<span><img src="https://alternatevape.com/wp-content/uploads/2011/05/alternate-vape-products-cbd-vape.jpg" alt=""></span>
<span class="name">${name}</span>

                                </a>
                                <div class="buttons">
                                <a href="javascript:void(0)" class="remove-all-attributes btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <input type="hidden" name="stocks[]" value="${id}">
                                </div></li>`);
            $(this)
                .parent()
                .remove();
        });
    </script>
@stop
@section("css")
    <link rel="stylesheet" href="https://mbraak.github.io/jqTree/jqtree.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
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

        .filter-form-place {
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

        .filter-form-place .mt-10 {
            margin-top: 10px;
        }
    </style>
@stop
