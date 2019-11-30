@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="container-fluid">
        <div class="row flex-column">
            @include("admin.settings._partials.menu",['active'=> 'main_pages'])

            <div class="tab-content">
                <div class="row">
                    <div class="col-sm-3 col-4 pr-md-3 pr-0">
                        <div class="nav flex-column list-group mt-3">
                            <a class="list-group-item list-group-item-action @if($p=='banners') active @endif" href="?p=banners">Home page</a>
                            <a class="list-group-item list-group-item-action @if($p=='tc') active @endif" href="?p=tc">T&C</a>
                            <a class="list-group-item list-group-item-action @if($p=='about_us')active @endif" href="?p=about_us">About us</a>
                            <a class="list-group-item list-group-item-action @if($p=='single_product')active @endif" href="?p=single_product">Single
                                Product</a>
                            <a class="list-group-item list-group-item-action @if($p=='single_post')active @endif" href="?p=single_post">Single
                                Post</a>
                            <a class="list-group-item list-group-item-action @if($p=='confirmation_page')active @endif" href="?p=confirmation_page">Confirmation
                                Page</a>
                            <a class="list-group-item list-group-item-action @if($p=='my_account')active @endif" href="?p=my_account">My Account</a>
                            <a class="list-group-item list-group-item-action @if($p=='stickers')active @endif" href="?p=stickers">Sticker</a>
                        </div>
                    </div>
                    <div class="col-sm-9 col-8">


                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-content-tab" data-toggle="tab" href="#nav-content" role="tab" aria-controls="nav-content" aria-selected="true">Content</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">SEO</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-content" role="tabpanel" aria-labelledby="nav-content-tab">
                                @include("admin.settings._partials.main_pages.".$p)
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @include("admin.settings._partials.seo")
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <script type="template" id="add-more-banners">
        <div class="col-md-12 mb-2 d-flex flex-wrap banner-item">
            <div class="col-sm-6 p-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        {!! media_button($p.'[]',$model) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <button class="plus-icon remove-new-banner-input btn btn-danger">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
    </script>
@stop
