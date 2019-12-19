@extends('layouts.admin')
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading">
            <h2 class="m-0">SEO</h2>
        </div>
        <div class="card-body panel-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="shipping-tab" href="{!! route('admin_seo_bulk') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Posts</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo_bulk_products') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Products</a>
                </li>
                @ok('admin_seo_bulk_pages')
                <li class="nav-item ">
                    <a class="nav-link active" id="admin_seo_pages " href="{!! route('admin_seo_bulk_pages') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Pages</a>
                </li>
                @endok
                @ok('admin_seo_bulk_brands')
                <li class="nav-item ">
                    <a class="nav-link " id="admin_seo_pages" href="{!! route('admin_seo_bulk_brands') !!}"
                       role="tab"
                       aria-controls="shipping" aria-selected="false">Brands</a>
                </li>
                @endok
            </ul>
            <div class="row">
                <div class="col-sm-3 col-4 pr-md-3 pr-0">
                    <div class="nav flex-column list-group mt-3">
                        <a class="list-group-item list-group-item-action @if($p=='banners') active @endif"
                           href="?p=banners">Home page</a>
                        <a class="list-group-item list-group-item-action @if($p=='tc') active @endif"
                           href="?p=tc">T&C</a>
                        <a class="list-group-item list-group-item-action @if($p=='about_us')active @endif"
                           href="?p=about_us">About us</a>
                        <a class="list-group-item list-group-item-action @if($p=='single_product')active @endif"
                           href="?p=single_product">Single
                            Product</a>
                        <a class="list-group-item list-group-item-action @if($p=='single_post')active @endif"
                           href="?p=single_post">Single
                            Post</a>
                        <a class="list-group-item list-group-item-action @if($p=='confirmation_page')active @endif"
                           href="?p=confirmation_page">Confirmation
                            Page</a>
                        <a class="list-group-item list-group-item-action @if($p=='my_account')active @endif"
                           href="?p=my_account">My Account</a>
                        <a class="list-group-item list-group-item-action @if($p=='stickers')active @endif"
                           href="?p=stickers">Sticker</a>
                    </div>
                </div>
                <div class="col-sm-9 col-8">


                    @include("admin.seo._partials.main_pages")

                </div>
            </div>

        </div>
    </div>
@stop
