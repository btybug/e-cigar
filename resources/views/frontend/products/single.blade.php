@extends('layouts.frontend')
@section('meta')
    {!! stockSeo($vape) !!}
@stop
@section('content')
    <div class="main-content">

        <!--shopping dtls fixed at the bottom-->
        <div class="continue-shp-wrapp">
            <div class="container main-max-width h-100 p-0">
                <div class="d-flex flex-lg-row flex-column align-items-center justify-content-between h-100">
                    <a href="{{ route('categories_front') }}"
                       class="continue-shp-wrapp_link font-sec-bold font-21 text-light-clr text-uppercase">continue
                        shopping</a>
                    <div class="d-flex align-items-center ml-lg-auto continue-shp-wrapp_right">
                        <div class="continue-shp-wrapp_qty position-relative">
                            <!--minus qty-->
                            <span data-type="minus"
                                  class="d-inline-block pointer position-absolute continue-shp-wrapp_qty-minus qty-count">
                            <svg viewBox="0 0 20 3" width="20px" height="3px">
                                <path fill-rule="evenodd" fill="rgb(214, 217, 225)"
                                      d="M20.004,2.938 L-0.007,2.938 L-0.007,0.580 L20.004,0.580 L20.004,2.938 Z"/>
                            </svg>
                        </span>
                        {!! Form::number('',1,['class' => 'field-input w-100 h-100 font-23 text-center border-0 product-qty-select none-touchable ','min' => 'number']) !!}
                        <!--plus qty-->
                            <span data-type="plus"
                                  class="d-inline-block pointer position-absolute continue-shp-wrapp_qty-plus qty-count">
                            <svg viewBox="0 0 20 20" width="20px" height="20px">
                                <path fill-rule="evenodd" fill="rgb(211, 214, 223)"
                                      d="M20.004,10.938 L11.315,10.938 L11.315,20.000 L8.696,20.000 L8.696,10.938 L-0.007,10.938 L-0.007,8.580 L8.696,8.580 L8.696,0.007 L11.315,0.007 L11.315,8.580 L20.004,8.580 L20.004,10.938 Z"/>
                            </svg>
                        </span>
                        </div>
                        <a href="#"
                           class="btn-add-to-cart product-card_btn d-inline-flex align-items-center justify-content-between text-center font-15 text-sec-clr text-uppercase"
                           data-toggle="modal" data-target="#specialPopUpModal">
                            <span class="product-card_btn-text">add to cart</span>
                            <span class="d-inline-block ml-auto">
                            <svg viewBox="0 0 18 22" width="18px" height="22px">
                                <path fill-rule="evenodd" opacity="0.8" fill="rgb(255, 255, 255)"
                                      d="M14.305,3.679 L14.305,0.003 L3.694,0.003 L3.694,3.679 L-0.004,3.679 L-0.004,21.998 L18.003,21.998 L18.003,3.679 L14.305,3.679 ZM4.935,1.216 L13.064,1.216 L13.064,3.679 L4.935,3.679 L4.935,1.216 ZM16.761,20.785 L1.238,20.785 L1.238,4.891 L3.694,4.891 L3.694,7.329 L4.935,7.329 L4.935,4.891 L13.064,4.891 L13.064,7.329 L14.305,7.329 L14.305,4.891 L16.761,4.891 L16.761,20.785 Z"></path>
                            </svg>
                        </span>
                        </a>
                        <span
                            class="product-card_price d-inline-block font-sec-bold font-41 text-tert-clr lh-1 position-relative">
                        <span class="price-place-summary">
                            @if($vape->type)
                                {{ convert_price($vape->price,$currency, false)}}
                            @endif
                        </span>
                    </span>
                    </div>
                </div>

            </div>

        </div>

        <div id="loading" class="d-flex justify-content-center align-items-center my-5">
            <div class="lds-dual-ring"></div>
        </div>
        <!--main-content-->
        <div id="singleProductPageCnt" class="single-product-page-cnt d-none flex-column ">
            <main class="position-relative">
                <!--breadcrump-->
                {{--                <div class="main-content container main-max-width main-content-wrapper">--}}
                {{--                    <div class="content-head d-flex flex-wrap justify-content-between">--}}
                {{--                        <div class="left-head d-flex align-items-center mb-lg-0 mb-2">--}}
                {{--                            {{ Breadcrumbs::render('single_product',$type,$vape->name) }}--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="products-wrap product__single-wrapper">
                    <div class="product__single-top">
                        <div class="container main-max-width h-100">
                            <div class="d-flex align-items-center product__single-top-inner h-100">
                                <div class="product__single-top-inner-left">
                                    <h1 class="font-sec-reg text-tert-clr font-28 text-uppercase product__single-top-title text-truncate">
                                        {!! $vape->name !!}
                                    </h1>
                                    <div class="d-flex align-items-center">
                                        <span class="font-sec-reg font-26 text-main-clr lh-1">
                                            {!! $vape->short_description !!}
                                        </span>
                                        @if(Auth::check())
                                            <span class="icon products__item-favourite product-card_like-icon
                                            {{ ($vape->in_favorites()->where('user_id',\Auth::id())->first())?'active':null}}"
                                                  data-id="{{ $vape->id }}">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="32px" height="31px" viewBox="0 0 31 32">
                                            <path fill-rule="evenodd" stroke-width="2px" stroke="rgb(53, 53, 53)"
                                                  opacity="0.702" fill="rgb(255, 255, 255)"
                                                  d="M21.852,2.990 C19.636,2.990 17.428,4.080 15.999,5.846 C14.571,4.080 12.363,2.990 10.147,2.990 C6.125,2.990 3.002,6.258 3.002,10.466 C3.002,15.639 7.419,19.857 14.178,26.113 L15.999,28.011 L17.821,26.113 C24.580,19.857 28.998,15.639 28.998,10.466 C28.998,6.258 25.875,2.990 21.852,2.990 L21.852,2.990 Z"/>
                                            </svg>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="brands-top-slider">
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-1.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-2.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-3.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-4.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-1.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-2.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-3.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-4.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-1.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-2.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-3.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="brand-wall">
                                        <div class="brand-item">
                                            <a href="#" class="brand-link">
                                                <img src="/public/img/brands/brand-single-4.png" alt="brand-logo">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container main-max-width single-product-dtls-wrap-outer pr-lg-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="single-product-dtls-wrap" id="requiredProducts">
                                    <div class="row">
                                        <div class="col-md-6 product-single-view-outer mr-0 w-100">
                                            <div class="product-card_view product-card_view--single position-relative">
                                                <!--product main image-->
                                                @if($vape->image)
                                                    <div class="h-100">
                                                        <img class="single-product_top-img"
                                                             src="{!! checkImage($vape->image) !!}"
                                                             alt="{!! @getImage( $vape->image)->seo_alt !!}">
                                                    </div>
                                                @endif
                                            <!--new label-->
                                                {{--                                                <span--}}
                                                {{--                                                    class="new-label product-card_new-label d-inline-block text-uppercase font-main-bold font-16 text-sec-clr position-absolute">new</span>--}}
                                            <!--sale label-->
                                                {{--                                                <span--}}
                                                {{--                                                    class="sale-label product-card_sale-label d-inline-block text-uppercase font-main-bold font-16 text-sec-clr position-absolute">-10%</span>--}}
                                            </div>

                                            <div class="d-flex product-card-thumbs product-card-thumbs--single">
                                                @if($vape->image)
                                                    <div class="product-card_thumb-img-holder pointer active_slider">
                                                        <img class="" src="{!! checkImage($vape->image) !!}"
                                                             alt="{!! @getImage( $vape->image)->seo_alt !!}">
                                                    </div>
                                                @endif
                                                @if($vape->variations && count($vape->variations))
                                                    @foreach($vape->variations()->required()->get() as $variation)
                                                        @if(isset($variation['image']))
                                                            <div class="product-card_thumb-img-holder pointer"
                                                                 data-id="{{ $variation['id'] }}">
                                                                <img class=""
                                                                     src="{{ checkImage($variation["image"]) }}"
                                                                     alt="{!! @getImage($variation["image"])->seo_alt !!}">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 product-single-info-outer">
                                            <div class="product-single-info">
                                                <input type="hidden" value="{{ $vape->id }}" data-p="{{ $vape->type }}"
                                                       id="vpid">

                                                <div class="product__single-item">
                                                    <div
                                                        class="d-flex flex-wrap align-items-center justify-content-between product__single-item-top">
                                                        <div
                                                            class="d-flex align-items-center justify-content-center product_btn-discount">
                                                            <span
                                                                class="font-sec-reg font-26 text-sec-clr">QTY Discount</span>
                                                        </div>
                                                        <div class="font-main-light font-20">
                                                            The more you order the more you get
                                                        </div>
                                                        <a href="#" class="font-20 text-tert-clr top_details">Offer
                                                            Details</a>
                                                    </div>

                                                    @include("admin.inventory._partials.render_price_form",['model' => $vape])
                                                </div>
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between product__single-delivery">
                                                    <div
                                                        class="d-flex align-items-center product__single-delivery-left">
                                                        <div
                                                            class="font-sec-reg text-main-clr font-28 lh-1 product__single-delivery-title">
                                                            Delivery
                                                        </div>
                                                        <div class="product__single-delivery-select">
                                                            <div class="select-wall product__select-wall">
                                                                <select name="" id=""
                                                                        class="select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible"
                                                                        style="width: 250px">
                                                                    <option value="">United Kingdom</option>
                                                                    <option value="">Armenia</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center product__single-delivery-right">
                                                        <div class="product__single-delivery-free font-20 lh-1">
                                                            Free on orders over £10
                                                        </div>
                                                        <a href="#"
                                                           class="product__single-delivery-details font-20 text-tert-clr lh-1">More
                                                            Details</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{--carousel--}}

                                <div class="product-single-tab">
                                    <div id="carousel-tabs-wrap" class="product-single-tab_nav-pills" role="tablist">
                                        <div class="carousel-tabs">
                                            <a class="nav-link product-single-tab_link font-20 font-main-bold main-transition active"
                                               data-toggle="pill" href="#pills-tecnical" role="tab"
                                               aria-controls="pills-tecnical" aria-selected="true">Technical</a>
                                            <a class="nav-link product-single-tab_link font-20 font-main-bold main-transition"
                                               data-toggle="pill" href="#pills-videos" role="tab"
                                               aria-controls="pills-videos" aria-selected="true">Videos</a>
                                            <a class="nav-link product-single-tab_link font-20 font-main-bold main-transition"
                                               data-toggle="pill" href="#pills-offers" role="tab"
                                               aria-controls="pills-offers" aria-selected="true">Offers</a>
                                            <a class="nav-link product-single-tab_link font-20 font-main-bold main-transition"
                                               data-toggle="pill" href="#pills-related" role="tab"
                                               aria-controls="pills-related" aria-selected="false">Related</a>
                                            @if($vape->reviews_tab)
                                                <a class="nav-link product-single-tab_link font-20 font-main-bold main-transition"
                                                   data-toggle="pill" href="#pills-reviews" role="tab"
                                                   aria-controls="pills-reviews" aria-selected="false">Reviews</a>
                                            @endif
                                            @if($vape->faq_tab)
                                                <a class="nav-link product-single-tab_link font-20 font-main-bold main-transition"
                                                   data-toggle="pill" href="#pills-faq" role="tab"
                                                   aria-controls="pills-faq" aria-selected="false">FAQ</a>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pills-tecnical"
                                             role="tabpanel"
                                             aria-labelledby="pills-tecnical-tab">
                                            {{--<p class="product-single-tecnical-text font-15 font-main-light text-light-clr mb-0">--}}
                                            {{--{!! $vape->long_description !!}--}}
                                            {{--</p>--}}
                                            <div class="d-flex flex-wrap">
                                                <div class="product_single-main-tab-content">
                                                    <div class="tecnical-desc">
                                                        <h3 class="tecnical-desc_sub-title font-main-bold font-24 text-uppercase">
                                                            Description</h3>
                                                        <div class="tecnical-desc_heading">
                                                            <div class="row">
                                                                <div class="col-lg-12 font-15 text-gray-clr">
                                                                    <div
                                                                        class="tecnical-desc_info-col font-15 text-gray-clr font-main-light">
                                                                        {!! $vape->long_description !!}
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--                                                <ul class="tecnical-labels list-unstyled d-flex">--}}
                                                        {{--                                                    @foreach($vape->stickers as $sticker)--}}
                                                        {{--                                                        <li class="tecnical-labels_item d-flex align-items-center">--}}
                                                        {{--                                                            <img src="{{ $sticker->image }}" alt=""--}}
                                                        {{--                                                                 class="tecnical-labels_item-img rounded-circle">--}}
                                                        {{--                                                            <span--}}
                                                        {{--                                                                class="tecnical-labels_item-text d-inline-block font-main-bold font-15">--}}
                                                        {{--                                                        {{ $sticker->name }}--}}
                                                        {{--                                                    </span>--}}
                                                        {{--                                                        </li>--}}
                                                        {{--                                                    @endforeach--}}

                                                        {{--                                                </ul>--}}
                                                    </div>
                                                    <div class="technical-features">
                                                        <h3 class="tecnical-desc_sub-title font-main-bold font-24 text-uppercase">
                                                            Features</h3>
                                                        <div class="d-flex flex-wrap technical-features-content">
                                                            @if($vape->stockAttrs && count($vape->stockAttrs))
                                                                @foreach($vape->stockAttrs as $stockAttr)
                                                                    @if($stockAttr->attr && $stockAttr->children && count($stockAttr->children))
                                                                        <div
                                                                            class="d-flex technical-features-content-wall">
                                                                            <div
                                                                                class="technical-features-content-left">
                                                                                <div
                                                                                    class="d-flex align-items-center h-100">
                                                                            <span
                                                                                class="font-18 text-sec-clr technical-features-content-title">{{ $stockAttr->attr->name }}</span>
                                                                                    @if($stockAttr->attr->description)
                                                                                        <span data-toggle="tooltip"
                                                                                              data-placement="top"
                                                                                              title="{!! $stockAttr->attr->description !!}">
                                                                                            <svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                width="24px"
                                                                                                height="24px"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path
                                                                                                    fill-rule="evenodd"
                                                                                                    fill="rgb(255, 255, 255)"
                                                                                                    d="M11.997,0.012 C5.379,0.012 0.012,5.379 0.012,11.997 C0.012,18.616 5.379,23.983 11.997,23.983 C18.616,23.983 23.983,18.616 23.983,11.997 C23.983,5.379 18.616,0.012 11.997,0.012 ZM14.492,18.587 C13.876,18.830 13.384,19.016 13.016,19.143 C12.649,19.271 12.222,19.336 11.736,19.336 C10.988,19.336 10.407,19.151 9.993,18.789 C9.579,18.424 9.373,17.962 9.373,17.401 C9.373,17.183 9.389,16.959 9.419,16.732 C9.451,16.506 9.500,16.250 9.568,15.962 L10.340,13.236 C10.408,12.972 10.467,12.723 10.514,12.492 C10.560,12.259 10.583,12.045 10.583,11.850 C10.583,11.503 10.511,11.259 10.368,11.123 C10.223,10.985 9.949,10.918 9.543,10.918 C9.344,10.918 9.139,10.948 8.929,11.010 C8.721,11.073 8.540,11.132 8.392,11.188 L8.596,10.348 C9.101,10.142 9.585,9.966 10.047,9.820 C10.509,9.671 10.945,9.598 11.356,9.598 C12.098,9.598 12.670,9.779 13.073,10.136 C13.474,10.494 13.676,10.960 13.676,11.532 C13.676,11.651 13.662,11.860 13.634,12.159 C13.606,12.458 13.555,12.730 13.479,12.982 L12.711,15.701 C12.649,15.920 12.593,16.169 12.542,16.447 C12.492,16.726 12.468,16.940 12.468,17.084 C12.468,17.444 12.548,17.691 12.710,17.822 C12.871,17.953 13.153,18.020 13.549,18.020 C13.737,18.020 13.947,17.986 14.185,17.920 C14.421,17.855 14.591,17.797 14.698,17.747 L14.492,18.587 ZM14.356,7.550 C13.999,7.883 13.567,8.049 13.062,8.049 C12.560,8.049 12.125,7.883 11.764,7.550 C11.405,7.217 11.223,6.812 11.223,6.339 C11.223,5.868 11.406,5.462 11.764,5.126 C12.125,4.789 12.560,4.621 13.062,4.621 C13.567,4.621 13.999,4.789 14.356,5.126 C14.714,5.462 14.894,5.868 14.894,6.339 C14.894,6.813 14.714,7.217 14.356,7.550 Z"/>
                                                                                            </svg>
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="technical-features-content-right">
                                                                                <div
                                                                                    class="d-flex align-items-center h-100">
                                                                            <span
                                                                                class="font-18 text-gray-clr font-main-light technical-features-content-desc">
                                                                                @foreach($stockAttr->children as $child)
                                                                                    {{ $child->sticker->name }} @if(! $loop->last)
                                                                                        , @endif
                                                                                @endforeach
                                                                            </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="technical-inside-box">
                                                        <h3 class="tecnical-desc_sub-title font-main-bold font-24 text-uppercase">
                                                            inside tHE BOX</h3>
                                                        <div class="d-flex flex-wrap technical-inside-box-inner">
                                                            <div class="technical-inside-box-left lh-1">
                                                                {!! $vape->what_is_content !!}
                                                            </div>
                                                            <div class="technical-inside-box-right">
                                                                <div class="technical-inside-box-photo">
                                                                    @if($vape->what_is_image)
                                                                        <img src="{{ $vape->what_is_image }}"
                                                                             alt="what is in box">
                                                                    @else
                                                                        <img src="/public/img/temp/inside-box.jpg"
                                                                             alt="what is in box">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="tecnical_gallery">
                                                        <div class="tecnical_gallery-all">

                                                            @if($vape->other_images && count($vape->other_images))
                                                                @foreach($vape->other_images as $other_image)
                                                                    <a href="{{ $other_image }}"
                                                                       class="tecnical_gallery_obj-holder lightbox-item"
                                                                       data-lightbox-gallery="gallery_name"
                                                                       title="{!! @getImage($other_image)->seo_alt !!}">
                                                                        <img src="{{ checkImage($other_image) }}"
                                                                             alt="{!! @getImage($other_image)->seo_alt !!}">
                                                                    </a>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_single-right-ads">
                                                    <div class="single-ads-wall">
                                                        <a href="#" class="d-block">
                                                            <img src="/public/img/temp/ads-product.jpg" alt="ads">
                                                        </a>
                                                    </div>
                                                    <div class="single-ads-wall">
                                                        <a href="#" class="d-block">
                                                            <img src="/public/img/temp/ads-product-2.jpg" alt="ads">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane related-tab-pane fade show" id="pills-related"
                                             role="tabpanel"
                                             aria-labelledby="pills-related-tab">
                                            <div class="d-flex flex-wrap">
                                                <div class="product_single-main-tab-content">
                                                    @include("frontend.products._partials.products_render",['products' => $vape->related_products])
                                                </div>
                                                <div class="product_single-right-ads">
                                                    <div class="single-ads-wall">
                                                        <a href="#" class="d-block">
                                                            <img src="/public/img/temp/ads-product.jpg" alt="ads">
                                                        </a>
                                                    </div>
                                                    <div class="single-ads-wall">
                                                        <a href="#" class="d-block">
                                                            <img src="/public/img/temp/ads-product-2.jpg" alt="ads">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($vape->reviews_tab)
                                            <div class="tab-pane fade show" id="pills-reviews" role="tabpanel"
                                                 aria-labelledby="pills-tecnical-tab">
                                                <p class="product-single-tecnical-text font-15 font-main-light text-light-clr mb-0">
                                                    I bought one.
                                                </p>
                                            </div>
                                        @endif
                                        @if($vape->faq_tab)
                                            <div class="tab-pane fade show" id="pills-faq" role="tabpanel"
                                                 aria-labelledby="pills-faq-tab">
                                                <div class="faq-wrapper">
                                                    @foreach($vape->faqs as $faq)
                                                        <div class="accordion offset-top-0" role="tablist"
                                                             aria-multiselectable="true" id="accordion-3">
                                                            <div class="card card-accordion"><a
                                                                    class="card-header collapsed" href="#"
                                                                    data-toggle="collapse"
                                                                    data-target="#accordion-3--card-0-content"
                                                                    id="accordion-3--card-0-header"
                                                                    aria-expanded="false"
                                                                    aria-controls="accordion-3--card-0-content"> {!! $faq->question !!}</a>
                                                                <div class="collapse"
                                                                     id="accordion-3--card-0-content"
                                                                     aria-labelledby="accordion-3--card-0-header"
                                                                     data-parent="#accordion-3" style="">
                                                                    <div
                                                                        class="card-body">{!! $faq->answer !!}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        @endif
                                        <div class="tab-pane fade show" id="pills-videos" role="tabpanel"
                                             aria-labelledby="pills-videos-tab">
                                            <div class="row video-carousel-wrap">
                                                <div class="col-2">
                                                    <div class="video--carousel-thumb d-flex flex-column"
                                                         data-carousel-controller-for=".video--carousel">
                                                        @if($vape->videos && count($vape->videos))
                                                            @foreach($vape->videos as $video)
                                                                <div class="video-item-thumb"><img
                                                                        src="https://img.youtube.com/vi/{{ $video }}/maxresdefault.jpg"
                                                                        alt="{{ $video }}"></div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="video--carousel">
                                                        @if($vape->videos && count($vape->videos))
                                                            @foreach($vape->videos as $video)
                                                                <div class="video-item">
                                                                    <iframe width="100%" height="415"
                                                                            src="https://www.youtube.com/embed/{{ $video }}?enablejsapi=1&version=3&playerapiid=ytplayer"
                                                                            frameborder="0"
                                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                            allowfullscreen></iframe>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="pills-offers" role="tabpanel"
                                             aria-labelledby="pills-offers-tab">
                                            <p class="product-single-offers-text font-15 font-main-light text-light-clr mb-0">
                                                offers
                                            </p>
                                        </div>
                                    </div>


                                </div>
                                {{--carousel--}}

                            </div>
{{--                            <div class="sharethis-inline-share-buttons"></div>--}}

                            {{--                            <div class="col-lg-1 col-2 ml-auto d-flex flex-column pr-0 product-single-share-col">--}}
                            {{--                                <div class="ml-auto">--}}
                            {{--                                    <div class="product-single-share-outer d-flex flex-column align-items-center justify-content-center">--}}
                            {{--                                        <span class="d-inline-block font-main-bold font-22">87</span>--}}
                            {{--                                        <span class="d-inline-block text-uppercase font-main-light fot-13">shares</span>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="d-flex flex-column align-items-center">--}}
                            {{--                                        <a href="#" class="product-single_share-icon d-inline-block">--}}
                            {{--                                            <svg viewBox="0 0 20 20" width="20px" height="20px">--}}
                            {{--                                                <path fill-rule="evenodd" fill="rgb(189, 193, 201)"--}}
                            {{--                                                      d="M18.891,0.005 L1.105,0.005 C0.498,0.005 0.002,0.497 0.002,1.108 L0.002,18.894 C0.002,19.503 0.498,19.999 1.105,19.999 L10.680,19.999 L10.680,12.256 L8.074,12.256 L8.074,9.237 L10.680,9.237 L10.680,7.011 C10.680,4.431 12.257,3.024 14.562,3.024 C15.667,3.024 16.612,3.106 16.890,3.144 L16.890,5.839 L15.290,5.843 C14.037,5.843 13.797,6.436 13.797,7.312 L13.797,9.237 L16.785,9.237 L16.395,12.252 L13.797,12.252 L13.797,19.999 L18.891,19.999 C19.500,19.999 19.996,19.503 19.996,18.894 L19.996,1.108 C19.996,0.497 19.500,0.005 18.891,0.005 L18.891,0.005 Z"></path>--}}
                            {{--                                            </svg>--}}
                            {{--                                        </a>--}}
                            {{--                                        <a href="#" class="product-single_share-icon d-inline-block">--}}
                            {{--                                            <svg viewBox="0 0 20 16" width="20px" height="16px">--}}
                            {{--                                                <path fill-rule="evenodd" fill="rgb(211, 214, 223)"--}}
                            {{--                                                      d="M19.998,1.890 C19.262,2.211 18.472,2.429 17.642,2.526 C18.489,2.026 19.139,1.235 19.445,0.291 C18.652,0.754 17.775,1.090 16.840,1.272 C16.092,0.486 15.026,-0.004 13.846,-0.004 C11.581,-0.004 9.744,1.805 9.744,4.036 C9.744,4.352 9.781,4.661 9.850,4.956 C6.441,4.788 3.419,3.179 1.395,0.735 C1.042,1.332 0.840,2.026 0.840,2.766 C0.840,4.168 1.564,5.404 2.665,6.129 C1.992,6.108 1.360,5.926 0.807,5.624 C0.807,5.641 0.807,5.657 0.807,5.675 C0.807,7.632 2.220,9.265 4.097,9.636 C3.753,9.728 3.390,9.778 3.016,9.778 C2.752,9.778 2.495,9.752 2.245,9.705 C2.766,11.310 4.282,12.478 6.076,12.511 C4.673,13.595 2.904,14.240 0.982,14.240 C0.651,14.240 0.324,14.221 0.003,14.184 C1.818,15.330 3.975,15.999 6.292,15.999 C13.837,15.999 17.962,9.843 17.962,4.504 C17.962,4.329 17.959,4.155 17.951,3.981 C18.752,3.412 19.448,2.700 19.998,1.890 L19.998,1.890 Z"></path>--}}
                            {{--                                            </svg>--}}
                            {{--                                        </a>--}}
                            {{--                                        <a href="#" class="product-single_share-icon d-inline-block">--}}
                            {{--                                            <svg viewBox="0 0 19 18" width="19px" height="18px">--}}
                            {{--                                                <path fill-rule="evenodd" fill="rgb(211, 214, 223)"--}}
                            {{--                                                      d="M19.002,11.037 L19.002,18.005 L14.930,18.005 L14.930,11.504 C14.930,9.872 14.342,8.757 12.868,8.757 C11.742,8.757 11.073,9.508 10.779,10.235 C10.671,10.494 10.644,10.855 10.644,11.219 L10.644,18.005 L6.571,18.005 C6.571,18.005 6.625,6.995 6.571,5.855 L10.644,5.855 L10.644,7.576 C10.635,7.590 10.624,7.603 10.617,7.616 L10.644,7.616 L10.644,7.576 C11.185,6.750 12.150,5.569 14.314,5.569 C16.994,5.569 19.002,7.305 19.002,11.037 L19.002,11.037 ZM2.309,-0.003 C0.916,-0.003 0.005,0.904 0.005,2.096 C0.005,3.263 0.890,4.196 2.256,4.196 L2.283,4.196 C3.703,4.196 4.586,3.263 4.586,2.096 C4.560,0.904 3.703,-0.003 2.309,-0.003 L2.309,-0.003 ZM0.247,18.005 L4.318,18.005 L4.318,5.855 L0.247,5.855 L0.247,18.005 Z"></path>--}}
                            {{--                                            </svg>--}}
                            {{--                                        </a>--}}
                            {{--                                        <a href="#" class="product-single_share-icon d-inline-block">--}}
                            {{--                                            <svg viewBox="0 0 24 15" width="24px" height="15px">--}}
                            {{--                                                <path fill-rule="evenodd" fill="rgb(211, 214, 223)"--}}
                            {{--                                                      d="M21.508,7.917 L21.508,10.421 L19.441,10.421 L19.441,7.917 L16.961,7.917 L16.961,5.830 L19.441,5.830 L19.441,3.325 L21.508,3.325 L21.508,5.830 L23.988,5.830 L23.988,7.917 L21.508,7.917 ZM7.537,15.013 C3.362,15.013 0.015,11.715 0.015,7.500 C0.015,3.284 3.362,-0.013 7.537,-0.013 C9.562,-0.013 11.339,0.571 12.621,1.823 L10.430,4.036 C9.728,3.284 8.694,2.909 7.537,2.909 C5.057,2.909 2.908,4.995 2.908,7.500 C2.908,10.004 5.057,12.091 7.537,12.091 C9.604,12.091 11.175,10.755 11.629,8.752 L7.455,8.752 L7.455,5.830 L14.729,5.830 C14.812,6.331 14.853,6.958 14.853,7.500 C14.853,8.043 14.812,8.544 14.729,9.045 C14.150,12.926 11.257,15.013 7.537,15.013 Z"></path>--}}
                            {{--                                            </svg>--}}
                            {{--                                        </a>--}}
                            {{--                                        <a href="#" class="product-single_share-icon d-inline-block">--}}
                            {{--                                            <svg viewBox="0 0 19 15" width="19px" height="15px">--}}
                            {{--                                                <path fill-rule="evenodd" fill="rgb(211, 214, 223)"--}}
                            {{--                                                      d="M17.729,14.995 L1.266,14.995 C0.571,14.995 0.001,14.384 0.001,13.642 L0.001,3.899 C0.001,3.158 0.454,2.916 1.010,3.364 L8.487,9.414 C8.767,9.638 9.133,9.748 9.500,9.744 C9.862,9.748 10.228,9.638 10.508,9.414 L17.985,3.364 C18.541,2.916 18.994,3.158 18.994,3.899 L18.994,13.642 C18.994,14.384 18.424,14.995 17.729,14.995 ZM10.651,6.618 C10.338,6.881 9.912,6.995 9.496,6.974 C9.083,6.995 8.653,6.877 8.344,6.618 L1.503,0.841 C0.957,0.380 1.080,0.004 1.776,0.004 L17.219,0.004 C17.916,0.004 18.038,0.380 17.492,0.841 L10.651,6.618 Z"></path>--}}
                            {{--                                            </svg>--}}
                            {{--                                        </a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}

                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <!--scroll top button-->
                <button id="scrollTopBtn"
                        class="scroll-top-btn d-flex align-items-center justify-content-center pointer">
                    <svg viewBox="0 0 17 10" width="17px" height="10px">
                        <path fill-rule="evenodd" fill="rgb(124, 124, 124)"
                              d="M0.000,8.111 L1.984,10.005 L8.498,3.789 L15.010,10.005 L16.995,8.111 L8.498,0.001 L0.000,8.111 Z"></path>
                    </svg>
                </button>
            </main>
        </div>
    </div>

    @if(! $vape->is_offer)
        <div class="modal fade p-0" id="specialPopUpModal" tabindex="-1" role="dialog"
             aria-labelledby="specialPopUpModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable mw-100" role="document">
                <div class="modal-content">
                    <div class="modal-header special__popup-head">
                        <h5 class="font-sec-reg font-26 text-sec-clr modal-title" id="specialPopUpModalTitle">Special
                            Offer</h5>
                        <div class="font-main-light font-20 text-main-clr align-self-stretch special__popup-head-mid">
                            You
                            might be interested in the following offers
                        </div>
                        <button type="button" class="align-self-stretch close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="42px" height="42px" viewBox="0 0 42 42">
<path fill-rule="evenodd" fill="rgb(53, 53, 53)"
      d="M42.008,1.300 L40.701,-0.009 L21.000,19.690 L1.301,-0.009 L-0.008,1.300 L19.691,21.000 L-0.008,40.699 L1.301,42.009 L21.000,22.307 L40.701,42.009 L42.008,40.699 L22.309,21.000 L42.008,1.300 Z"/>
</svg>
                        </span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop

@section('css')
    <link href="/public/plugins/formstone/carousel/carousel.css" rel="stylesheet">
    <link href="/public/plugins/formstone/lightbox/lightbox.css" rel="stylesheet">
    <link href="/public/plugins/formstone/light.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
          href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css"/>

    <style>
        .products__item-favourite.active svg path {
            fill: #ee3a50;
        }

        .products__item-favourite {
            cursor: pointer;
        }

        .share-social-btn {
            position: relative;
        }

        .product-share-social {
            background: #353636;
            visibility: hidden;
            opacity: 0;
            transition: all .5s;
            position: absolute;
            right: 0;
            top: 150%;
        }

        .product-share-social .jssocials-share {
            margin-right: 0;
        }

        .product-share-social:before {
            position: absolute;
            bottom: 100%;
            right: 5px;
            content: '';
            display: inline-block;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 10px 16px 10px;
            border-color: transparent transparent #353636 transparent;
        }

        .product-share-social .jssocials-shares {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        .share-social-btn:hover .product-share-social {
            visibility: visible;
            opacity: 1;
        }

        .video--carousel-thumb .fs-carousel-active {
            border: 2px solid #5184e5 !important;
        }

        .video--carousel-thumb .fs-carousel-item {
            border: 2px solid transparent;
        }

        .product-single-info_radio-label:before {
            border-radius: 50%;
        }
    </style>
@stop

@section("js")
    <script src="/public/plugins/formstone/core.js"></script>
    <script src="/public/plugins/formstone/mediaquery.js"></script>
    <script src="/public/plugins/formstone/touch.js"></script>
    <script src="/public/plugins/formstone/transition.js"></script>
    <script src="/public/plugins/formstone/lightbox/lightbox.js"></script>
    <script src="/public/plugins/formstone/carousel/carousel.js"></script>
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <script>
        //esia
        // var variations = {
        //     "group_id" : "5ca48c5f4401f",
        //     "products" : [
        //         {id:135,qty:1}
        //     ]
        // };

        $(document).ready(function () {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            // $.ajax({
            //     type: "post",
            //     url: "/add-extra-to-cart",
            //     cache: false,
            //     datatype: "json",
            //     data: {key: "5ca7011cc5a0a",product_id: $("#vpid").val(),variations:variations},
            //     headers: {
            //         "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            //     },
            //     success: function (data) {
            //         if (!data.error) {
            //             $(".cart-count").html(data.count)
            //             $('#cartSidebar').html(data.headerHtml)
            //             $("#headerShopCartBtn").trigger('click');
            //         } else {
            //
            //         }
            //     }
            // });

//          ----start  video carousel----
//             function Init () {
//                 var checkbox = document.getElement("myCheckbox");
//                 if (checkbox.addEventListener) {
//                     checkbox.addEventListener ("CheckboxStateChange", OnChangeCheckbox, false);
//                 }
//             }
//
//             function OnChangeCheckbox (event) {
//                 var checkbox = event.target;
//                 if (checkbox.checked) {
//                     alert ("The check box is checked.");
//                 }
//                 else {
//                     alert ("The check box is not checked.");
//                 }
//             }


//          ----end  video carousel----

            $(".tecnical_gallery_obj-holder").lightbox();

            $(".lightbox-product").lightbox();
            $('body').on('change', '.products_custom_check input', function () {
                if ($(this).is(':checked')) {
                    $(this).closest('.product-single-info_row').find('.extra-product').removeClass('products_closed')
                } else {
                    $(this).closest('.product-single-info_row').find('.extra-product').addClass('products_closed')
                }

            })


            $("body").on('change', '.select-variation-option', function () {
                get_price();
                call_subtotal();
            });

            $("body").on('change', '.select-variation-radio-option', function () {
                get_price();
                call_subtotal();
            });

            $("body").on('click', '.optional_checkbox', function () {
                get_subTotalPrice();
            });

            $("body").on('click', '.add-to-cart', function () {

                if (variationId && variationId != '') {
                    var requiredItems = [];
                    var optionalItems = [];

                    var requiredItemsData = $(".required_item");
                    var optionalItemsData = $(".optional_item");


                    optionalItemsData.each(function (i, e) {
                        if ($(e).parent().find('.optional_checkbox').is(':checked')) {
                            optionalItems.push($(e).val());
                        }
                    });

                    requiredItemsData.each(function (i, e) {
                        requiredItems.push($(e).val());
                    });
//                    console.log(requiredItems)
//                    return false;
                    $.ajax({
                        type: "post",
                        url: "/add-to-cart",
                        cache: false,
                        datatype: "json",
                        data: {uid: variationId, requiredItems: requiredItems, optionalItems: optionalItems},
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function (data) {
                            if (!data.error) {
                                $(".cart-count").html(data.count)
                                $('#cartSidebar').html(data.headerHtml)
                                $("#headerShopCartBtn").trigger('click');
                            } else {

                            }
                        }
                    });
                } else {
                    alert('Select available variation');
                }
            })


            function get_price() {
                var uid = $("#vpid").val();
                var items = document.getElementsByClassName('select-variation-option');
                $(".btn-add-to-cart").removeClass('add-to-cart');
                let options = {};
                for (var i = 0; i < items.length; i++) {
                    options[$(items[i]).data('name')] = $(items[i]).val();
                }

                $.map($("[data-main-stock='" + uid + "'] input:radio:checked"), function (elem, idx) {
                    options[$(elem).data('name')] = $(elem).val();
                });

                $.ajax({
                    type: "post",
                    url: "/products/get-price",
                    cache: false,
                    datatype: "json",
                    data: {options: options, uid: uid},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            var price = data.price;
                            if (data.message) {
                                price = "<span class='d-inline-block font-16'>" + data.message + "</span>" + data.price;
                            }
                            $(".price-place").html(price);
                            $("#variation_uid").val(data.variation_id);
                            $(".btn-add-to-cart").addClass('add-to-cart');

                            $(".product-card-thumbs").find('[data-id="' + data.variation_id + '"]').trigger("mouseover");
                            if (data.isFavorite) {
                                $(".add-fav-variation").removeClass('d-none').data('id', data.variation_id).addClass('active');
                            } else {
                                $(".add-fav-variation").removeClass('d-none').data('id', data.variation_id).removeClass('active');
                            }

                        } else {
                            $(".price-place").html('<span class="d-inline-block font-16">' + data.message + '</span>');
                            $("#variation_uid").val('');
                            $(".add-fav-variation").addClass('d-none').data('id', '').removeClass('active');
                        }
                    }
                });
            }

            function get_subTotalPrice() {
                var variationId = $("#variation_uid").val();

                if (variationId && variationId != '') {
                    var requiredItems = [];
                    var optionalItems = [];

                    var requiredItemsData = $(".required_item");
                    var optionalItemsData = $(".optional_item");

                    console.log(requiredItemsData, 445445454465)
                    optionalItemsData.each(function (i, e) {
                        if ($(e).parent().find('.optional_checkbox').is(':checked')) {
                            optionalItems.push($(e).val());
                        }
                    });

                    requiredItemsData.each(function (i, e) {
                        requiredItems.push($(e).val());
                    });

                    $.ajax({
                        type: "post",
                        url: "/products/get-subtotal-price",
                        cache: false,
                        datatype: "json",
                        data: {uid: variationId, requiredItems: requiredItems, optionalItems: optionalItems},
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function (data) {
                            if (!data.error) {
                                $(".price-place-summary").html(data.price)
                            } else {
                                $(".price-place-summary").html(data.message)
                            }
                        }
                    });
                }
            }

            function call_extra_products() {
                var plist = $(".poptions-group");
                for (var i = 0; i < plist.length; i++) {
                    get_promotion_price($(plist[i]).data('promotion'))
                }
            }

            $("body").on('change', '.select-variation-poption', function () {
                var pid = $(this).closest('.poptions-group').data('promotion');
                get_promotion_price(pid);
                call_subtotal();
            });

            $("body").on('change', '.select-variation-radio-poption', function () {
                var pid = $(this).closest('.poptions-group').data('promotion');
                get_promotion_price(pid);
                call_subtotal();
            });

            function get_promotion_price(pid) {
                let options = {};
                var uid = $("#vpid").val();
                $.map($("[data-promotion='" + pid + "'] input:radio:checked"), function (elem, idx) {
                    options[$(elem).data('name')] = $(elem).val();
                });

                $.map($("[data-promotion='" + pid + "'] .select-variation-poption"), function (elem, idx) {
                    options[$(elem).data('name')] = $(elem).val();
                });

                console.log(options);
//            price-place-promotion
                $.ajax({
                    type: "post",
                    url: "/products/get-price",
                    cache: false,
                    datatype: "json",
                    data: {options: options, uid: pid, promotion: true, stock_id: uid},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            var price = data.price;
                            if (data.message) {
                                price = "<span class='d-inline-block font-16'>" + data.message + "</span>" + data.price;
                            }

                            $("[data-promotion='" + pid + "'] .price-place-promotion").html(price);
                            $("[data-promotion='" + pid + "'] .variation_items").val(data.variation_id);
//                        $("#variation_uid").val(data.variation_id);
//                        $(".btn-add-to-cart").addClass('add-to-cart');
                        } else {
                            $("[data-promotion='" + pid + "'] .price-place-promotion").html('<span class="d-inline-block font-16">' + data.message + '</span>');
                            $("[data-promotion='" + pid + "'] .variation_items").val('');
//                        $("#variation_uid").val('');
                        }
                    }
                });
            }

            async function getP() {
                await get_price();
                await call_extra_products();
            }

            getP();

            function call_subtotal(time = 300) {
                setTimeout(
                    function () {
                        get_subTotalPrice();
                    }, time);
            }

            call_subtotal(500);

            $("body").on('click', '.product-card_like-icon', function () {

                let url;
                let is_active = $(this).hasClass("active");

                url = (is_active) ? "/my-account/delete_favourites" : "/my-account/add_favourites";

                let variation_id = $(this).attr("data-id");
                let _this = $(this);
                console.log(`${variation_id}  ---->  `, _this);
                if (variation_id) {
                    $.ajax({
                        type: "post",
                        url: url,
                        cache: false,
                        data: {
                            id: variation_id
                        },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function (data) {
                            console.log(data);
                            if (!data.error) {
                                _this.toggleClass("active")
                            } else {
                                alert("error");
                            }
                        }
                    })
                }
            });


            $("#share").jsSocials({
                shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
            });

            $("#select_items").select2();
        });
    </script>
@stop
