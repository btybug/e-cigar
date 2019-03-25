@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="col-md-12">
        <div class="card panel panel-default">
            <div class="card-header panel-heading head-space-between">
                {!! Form::model($category,['url'=>route('post_admin_tools_filters_edit_category',$category->id),'class'=>'w-100']) !!}
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::text('translatable['.strtolower(app()->getLocale()).'][name]',$category->name,['class'=>'form-control','required'=>true,'placeholder'=>'Filter Name']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('translatable['.strtolower(app()->getLocale()).'][description]',$category->description,['class'=>'form-control','required'=>true,'placeholder'=>'Filter Name']) !!}

                        </div>

                    </div>
                    <div class="button-area text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div class="card-body panel-body">
                <div class="d-flex flex-wrap justify-content-between mb-1">
                    <button type="button" class="btn btn-primary add-filter"><i class="fa fa-plus fa-sm mr-10"></i>Add
                        New
                    </button>
                    {!! Form::button('View Result',['class' => 'btn btn-primary','data-toggle'=>"modal",'data-target'=>"#view-result"]) !!}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div id="tree1"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="content-area filter-form-place">
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
    <div class="modal fade" id="itemsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade releted-products-add-modal" id="view-result" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Result</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    {{--<div class="d-flex flex-wrap justify-content-center mb-2">--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<select name="" id="" class="form-control">--}}
                                {{--<option value="">1</option>--}}
                                {{--<option value="">2</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<select name="" id="" class="form-control">--}}
                                {{--<option value="">1</option>--}}
                                {{--<option value="">2</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<select name="" id="" class="form-control">--}}
                                {{--<option value="">1</option>--}}
                                {{--<option value="">2</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="row releted__products-panel">
                        <div class="col-md-3">
                            <div class="">
                                {!! Form::open(['id'=>'filter-form']) !!}
                                <legend>{!! $category->description !!}</legend>
                                <div class="product-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-xs-12">{!! $category->name !!}</label>
                                        <div class="col-md-10">
                                            {!! Form::select('filters[]',[null=>'Select Parent']+$category->filters()->get()->pluck('name','id')->toArray(),null,['class'=>'form-control filter-select','required'=>true]) !!}
                                        </div>

                                    </div>
                                    <div class="filter-children-selects">

                                    </div>
                                </div>
                                {!! Form::close() !!}


                            </div>
                        </div>
                        <div class="col-md-9">
                            {{--<div class="right-content-view--results">--}}
                                {{--<ul class="d-flex flex-wrap list-items--wrapper">--}}
                                    {{--<li class="col-md-3 col-sm-6 ">--}}
                                        {{--<div class="single-item">--}}
                                            {{--<div class="img-item">--}}
                                                {{--<img src="https://www.cigarette-electronique-pas-cher.net/wp-content/uploads/2018/07/vape-3423486_960_720.jpg"--}}
                                                     {{--alt="vape">--}}
                                            {{--</div>--}}
                                            {{--<div class="name-item">--}}
                                                {{--<span>Item</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="col-md-3 col-sm-6 ">--}}
                                        {{--<div class="single-item">--}}
                                            {{--<div class="img-item">--}}
                                                {{--<img src="https://www.cigarette-electronique-pas-cher.net/wp-content/uploads/2018/07/vape-3423486_960_720.jpg"--}}
                                                     {{--alt="vape">--}}
                                            {{--</div>--}}
                                            {{--<div class="name-item">--}}
                                                {{--<span>Item</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="col-md-3 col-sm-6 ">--}}
                                        {{--<div class="single-item">--}}
                                            {{--<div class="img-item">--}}
                                                {{--<img src="https://www.cigarette-electronique-pas-cher.net/wp-content/uploads/2018/07/vape-3423486_960_720.jpg"--}}
                                                     {{--alt="vape">--}}
                                            {{--</div>--}}
                                            {{--<div class="name-item">--}}
                                                {{--<span>Item</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="col-md-3 col-sm-6 ">--}}
                                        {{--<div class="single-item">--}}
                                            {{--<div class="img-item">--}}
                                                {{--<img src="https://www.cigarette-electronique-pas-cher.net/wp-content/uploads/2018/07/vape-3423486_960_720.jpg"--}}
                                                     {{--alt="vape">--}}
                                            {{--</div>--}}
                                            {{--<div class="name-item">--}}
                                                {{--<span>Item</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li class="col-md-3 col-sm-6 ">--}}
                                        {{--<div class="single-item">--}}
                                            {{--<div class="img-item">--}}
                                                {{--<img src="https://www.cigarette-electronique-pas-cher.net/wp-content/uploads/2018/07/vape-3423486_960_720.jpg"--}}
                                                     {{--alt="vape">--}}
                                            {{--</div>--}}
                                            {{--<div class="name-item">--}}
                                                {{--<span>Item</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            <div class="product-body">
                                <ul class="get-all-attributes-tab row filter-children-items">

                                </ul>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary">Back</button>
                                <span>Sone text</span>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Next</button>
                            </div>
                        </div>
                    </div>


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
        var data = {!! json_encode(\App\Models\Filters::recursiveItems($category->filters),true) !!};
        $("#tree1").tree({
            data: data,
            autoOpen: true,
            saveState: true,
        });
        $('body').on('click', '.btn-submit-form', function () {
            $('.filter-form-place .updated-form').submit()
        });
        $("body").on('click', '.select-products', function () {
            let parent = $('.get-all-attributes-tab').find('li');
            let existings = [];
            parent.each(function (i, e) {
                existings.push($(e).data('id'));
            });
            AjaxCall("{{ route('admin_stock_package_variation_items') }}", {
                items: existings,
                uniqueId: parent.attr('data-unqiue')
            }, function (res) {
                if (!res.error) {
                    $("#itemsModal .modal-content").html(res.html);
                    $("#itemsModal #searchStickers").select2();
                    $("#itemsModal").modal();
                }
            });
        });

        $("body").on("change", "#itemsModal #searchStickers", function () {
            let stickers = $(this).val();
            let data_id = $(this).attr('data-section-id');

            let $_this = $('body').find('[data-unqiue="' + data_id + '"]');
            let existings = [];
            $_this.find('.v-item-change')
                .each(function (i, e) {
                    existings.push($(e).val());
                });
            AjaxCall("{{ route('admin_stock_search_items') }}", {items: existings, stickers: stickers}, function (res) {
                if (!res.error) {
                    $("#itemsModal .modal-stickers--list").html(res.html);
                }
            });
        });


        $('body').on('click', '#itemsModal .option-elm-modal', function () {
            $(this).toggleClass('active')
        });


        $("body").on('click', '.add-filter', function () {
            AjaxCall("{!! route('admin_tools_filters_form') !!}", {category_id: "{!! $category->id !!}"}, function (res) {
                if (!res.error) {
                    $(".filter-form-place").html(res.html);
                    $('.icon-picker').iconpicker();
                    $("#select-stickers").select2();
                }
            });
        });
        $("body").on('change', '.filter-select', function () {
            let data = $('form#filter-form').serialize();
            AjaxCall("{!! route('admin_tools_filters_next') !!}", data, function (res) {
                if (!res.error) {
                    switch (res.type) {
                        case 'filter':
                            $('.filter-children-items').empty();
                            $('.filter-children-selects').html(res.html);
                            break;
                        case 'items':
                            $('.filter-children-selects').html(res.html);
                            $('.filter-children-items').html(res.items_html);
                            break;
                    }
                }
            });
        });
        $("body").on('click', '.detach-item', function () {
            let _this = $(this);
            AjaxCall($(this).data('href'), {slug: $(this).data('key')}, function (res) {
                if (!res.error) {
                    $(_this).closest('li').remove()
                }
            });
        });

        $("#tree1").bind("tree.click", function (e) {
            console.log(e.node);
            AjaxCall("{!! route('admin_tools_filters_form') !!}", {
                id: e.node.parent_id,
                child_id: e.node.id,
                category_id: e.node.category_id
            }, function (res) {
                if (!res.error) {
                    $(".filter-form-place").html(res.html);
                    $('.icon-picker').iconpicker();
                    $("#select-stickers").select2();

                }
            });
        });


        $("body").on("click", ".add-package-items", function () {
            console.log(1);
            $("#itemsModal").modal('hide');
            let items = $('#itemsModal').find('.all-list li.active');
            $.each(items, function (k, v) {
                let id = $(v).data("id");
                let name = $(v).data("name");
                let img = $(v).find('img').attr('src');
                $(".get-all-attributes-tab")
                    .append(`<li  data-id="${id}" class="option-elm-attributes col-md-3"><div class="wrap-item"><a
                                href="#">
<span><img src="${img}" alt=""></span>
<span class="name">${name}</span>

                                </a>
                                <div class="buttons">
                                <a href="javascript:void(0)" class="remove-all-attributes btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <input type="hidden" name="items[]" value="${id}">
                                </div></li>`);
                $(this)
                    .parent()
                    .remove();
            });
        });
    </script>
@stop
@section("css")
    <link rel="stylesheet" href="/public/css/custom.css">
    <link rel="stylesheet" href="https://mbraak.github.io/jqTree/jqtree.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <style>
        #itemsModal .items-box {
            flex: 1;
        }

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

        #view-result .modal-lg {
            max-width: 80%;
        }
    </style>
@stop
