@extends('layouts.admin',['activePage'=>'discounts'])
@section('content')
    <div class="d-flex flex-wrap justify-content-between w-100 admin-general--tabs-wrapper">
        <ul class="nav nav-tabs new-main-admin--tabs mb-3 admin-general--tabs">
            @foreach($warehouse as $key=>$warehous)
                <li class="nav-item">
                    <a class="nav-link @if($q ==$key)active @endif"   href="{!! route('admin_app_products',$key) !!}">{!! $warehous !!}</a>
                </li>
            @endforeach

        </ul>
    </div>
    <button type="button" class="btn btn-info select-products" data-action="{!! route('admin_app_not_selected_products',$q) !!}">
        Select
    </button>
    <ul class="get-all-products-tab stickers--all--lists">
        
    </ul>
    <div class="modal fade select-products__modal" id="productsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Products</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <select class="form-control search_option_js">
                                <option value="general" selected>General</option>
                                <option value="brand">Brands</option>
                                <option value="category">Categories</option>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control search-attr" id="search-product" placeholder="Search">
                            <select class="form-control d-none" id="brand_select">

                            </select>
                            <select class="form-control d-none" id="category_select">

                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <input type="checkbox" class="all_select_products_js" style="margin: 0 18.240px"/>
                        <p class="mb-0">Select All</p>
                    </div>
                    <ul class="all-list modal-stickers--list" id="stickers-modal-list">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary done_select_product_js" data-dismiss="modal">Add</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
