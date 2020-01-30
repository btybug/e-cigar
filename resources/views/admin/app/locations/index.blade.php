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

@stop

@section('js')

@stop
