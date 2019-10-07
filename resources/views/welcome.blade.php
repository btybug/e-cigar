@extends('layouts.frontend')
@section('content')
    <main class="main-content">
        <div class="home__page-wrapper">
            <section class="home_slider-wrapper">
                <div class="home__main-slider">
                    @if(count($banners))
                        @foreach($banners as $banner)
                            @php
                                $banner = ltrim($banner, '/');
                                $html = (File::exists($banner)) ? File::get($banner) : "";
                            @endphp
                            <div>
                                {!! $html !!}
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="home__main-slider-thumb" data-carousel-controller-for=".home__main-slider">
                    @if(count($banners))
                        @foreach($banners as $banner)
                            @php
                                $banner = ltrim($banner, '/');
                                $html = (File::exists($banner)) ? File::get($banner) : "";
                            @endphp
                            <div class="thumb-wall">
                                {!! $html !!}
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
            <div class="container home_width p-home-mobile">
                <section class="home_categories">
                    <h2 class="font-sec-reg home_main-title text-center"><span class="font-sec-bold">OUR</span> <span>CATEGORIES</span>
                    </h2>
                    <p class="font-main-light font-15 text-center home_title-desc">Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Suspendisse lorem risus, molestie tincidunt lacus nec,
                        <br/> sagittis tincidunt neque. Aenean luctus tempor libero eget ultrices. Curabitur at nibh
                        orci.</p>
                    <ul class="row home_categories_list">
                        @if(count($categories))
                            @foreach($categories as $category)
                                <li class="col-md-6">
                                    <div class="position-relative home_categories-item">
                                        <img src="{!! media_image_tmb($category->image) !!}" alt="photo">
                                        <div class="d-flex flex-column position-absolute home_categories-item-inner">
                                            <h4 class="font-sec-bold font-35 ">{{ $category->name }}</h4>
                                            <p>{{ $category->description }}</p>
                                            <a href="{!! route('categories_front',$category->slug) !!}" class="btn mt-auto text-uppercase font-15 home_categories-item-btn">view
                                                products</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif

                        {{--<li class="col-md-6">--}}
                            {{--<div class="position-relative home_categories-item">--}}
                                {{--<img src="/public/img/temp/product_2.jpg" alt="photo">--}}
                                {{--<div class="d-flex flex-column position-absolute home_categories-item-inner">--}}
                                    {{--<h4 class="font-sec-bold font-35 ">Cbd</h4>--}}
                                    {{--<p>Suspendisse at ante ac arcu elementum <br/>--}}
                                        {{--interdum. Nullam lorem elit.</p>--}}
                                    {{--<a href="#" class="btn mt-auto text-uppercase font-15 home_categories-item-btn">view--}}
                                        {{--products</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-6">--}}
                            {{--<div class="position-relative home_categories-item mb-0">--}}
                                {{--<img src="/public/img/temp/product_3.jpg" alt="photo">--}}
                                {{--<div class="d-flex flex-column position-absolute home_categories-item-inner">--}}
                                    {{--<h4 class="font-sec-bold font-35 ">E-liquid</h4>--}}
                                    {{--<p>Suspendisse at ante ac arcu elementum <br/>--}}
                                        {{--interdum. Nullam lorem elit.</p>--}}
                                    {{--<a href="#" class="btn mt-auto text-uppercase font-15 home_categories-item-btn">view--}}
                                        {{--products</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-6">--}}
                            {{--<div class="position-relative home_categories-item mb-0">--}}
                                {{--<img src="/public/img/temp/product_4.jpg" alt="photo">--}}
                                {{--<div class="d-flex flex-column position-absolute home_categories-item-inner">--}}
                                    {{--<h4 class="font-sec-bold font-35 ">Parts</h4>--}}
                                    {{--<p>Suspendisse at ante ac arcu elementum <br/>--}}
                                        {{--interdum. Nullam lorem elit.</p>--}}
                                    {{--<a href="#" class="btn mt-auto text-uppercase font-15 home_categories-item-btn">view--}}
                                        {{--products</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    </ul>
                </section>
            </div>
            <section class="home_brands-wrapper">
                <h2 class="font-sec-reg home_main-title text-center text-white"><span class="font-sec-bold">OUR</span>
                    <span>BRANDS</span>
                </h2>
                <p class="font-main-light font-15 text-center home_title-desc text-sec-clr">Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Suspendisse lorem risus, molestie tincidunt lacus nec,
                    <br> sagittis tincidunt neque. Aenean luctus tempor libero eget ultrices. Curabitur at nibh
                    orci.
                </p>
                <div class="home_brands-slider">
                    @foreach($brands as $brand)
                        <div class="brand-wall">
                            <div class="brand-item">
                                <a href="javascript:void(0)" class="brand-link">
                                    <img src="{{ $brand->image }}" alt="brand-logo">
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>

                <section class="home_products-wrapper">
                    <div class="container home_width">
                        <h2 class="font-sec-reg home_main-title text-center"><span class="font-sec-bold">TOP</span>
                            <span>PRODUCTS</span>
                        </h2>
                        <p class="font-main-light font-15 text-center home_title-desc mb-0">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Suspendisse lorem risus, molestie tincidunt lacus nec,
                            <br> sagittis tincidunt neque. Aenean luctus tempor libero eget ultrices. Curabitur at nibh
                            orci.
                        </p>
                        <div class="home_products-version-mobile d-sm-none d-block">
                            <div class="home_products-version-mobile-select">
                                <select class="select-2 select-2--no-search main-select main-select-2arrows not-selected top-selectbox" name="" id="" style="width: 100%">
                                    @if(count($tops))
                                        @foreach($tops['name'] as $k => $top)
                                            <option value="{{$k}}">{{ $top}}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex home_products-version">
                        @if(count($tops))
                            @foreach($tops['name'] as $k => $top)
                                <div class="top-parent col @if($loop->first) active @endif">
                                    <a href="javascript:void(0)" data-key="{{ $k }}" class="products-version-link top-link">
                                        {{ $top }}
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="products__list-wrapper home_products-carousel">
                        @php
                        $topProducts = (count($tops) && isset($tops['products'][0])) ? $tops['products'][0] : [];
                        @endphp
                        @include("frontend._partials.top_products",['topProducts' => $topProducts])
                    </div>
                    <div class="line-home"></div>
                </section>

            <section class="home_reviews-wrapper">
                <div class="container home_width">
                    <div class="row">
                        <div class="col-md-6 home_reviews-left-border">
                            <div class="home_reviews-left">
                                <div class="font-sec-reg text-uppercase text-main-clr home_reviews-left-title">
                                    <span class="font-sec-bold">CUSTOMERS</span>
                                    <span>REVIEWS</span>
                                </div>
                                <p class="font-main-light font-15 home_reviews-left-desc">There are many variations of
                                    passages of Lorem Ipsum available, but
                                    the majority have suffered alteration in some form, by injected humour,
                                    or randomised words which don't look even slightly believable. If you
                                    are going to use a passage of Lorem Ipsum, you need to be sure.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-main-clr home_reviews-slider">
                                <div class="home_reviews-slider-item">
                                    <div class="font-sec-reg font-21 lh-1 home_reviews-slider-title">Ethan Hawkins</div>
                                    <div class="home_reviews-slider-stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <p class="font-main-light font-15 home_reviews-slider-desc">There are many
                                        variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour,
                                        or randomised words which don't look even slightly believable.</p>
                                </div>
                                <div class="home_reviews-slider-item">
                                    <div class="font-sec-reg font-21 lh-1 home_reviews-slider-title">Ethan Hawkins</div>
                                    <div class="home_reviews-slider-stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <p class="font-main-light font-15 home_reviews-slider-desc">There are many
                                        variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour,
                                        or randomised words which don't look even slightly believable.</p>
                                </div>
                                <div class="home_reviews-slider-item">
                                    <div class="font-sec-reg font-21 lh-1 home_reviews-slider-title">Ethan Hawkins</div>
                                    <div class="home_reviews-slider-stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <p class="font-main-light font-15 home_reviews-slider-desc">There are many
                                        variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour,
                                        or randomised words which don't look even slightly believable.</p>
                                </div>
                                <div class="home_reviews-slider-item">
                                    <div class="font-sec-reg font-21 lh-1 home_reviews-slider-title">Ethan Hawkins</div>
                                    <div class="home_reviews-slider-stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <p class="font-main-light font-15 home_reviews-slider-desc">There are many
                                        variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour,
                                        or randomised words which don't look even slightly believable.</p>
                                </div>
                                <div class="home_reviews-slider-item">
                                    <div class="font-sec-reg font-21 lh-1 home_reviews-slider-title">Ethan Hawkins</div>
                                    <div class="home_reviews-slider-stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <p class="font-main-light font-15 home_reviews-slider-desc">There are many
                                        variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour,
                                        or randomised words which don't look even slightly believable.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container home_width p-home-mobile">
                <section class="d-flex flex-wrap align-items-end justify-content-between home_delivery-wrapper">
                    <div class="home_delivery-left">
                        <div class="font-main-bold home_delivery-title">
                            DPD NEXT DAY DELIVERY
                        </div>
                        <p class="font-20 home_delivery-desc">Free on orders over $100 - Order before 4pm <br/>
                            Saturday and Sunday delivery available.</p>
                    </div>
                    <div class="home_delivery-right lh-1">
<span class="font-sec-bold home_delivery-price">
50%
</span>
                        <span class="font-sec-reg home_delivery-off">OFF</span>
                    </div>
                </section>
            </div>
            <button id="scrollTopBtn" class="scroll-top-btn d-flex align-items-center justify-content-center pointer">
                <svg viewBox="0 0 17 10" width="17px" height="10px">
                    <path fill-rule="evenodd" fill="rgb(124, 124, 124)" d="M0.000,8.111 L1.984,10.005 L8.498,3.789 L15.010,10.005 L16.995,8.111 L8.498,0.001 L0.000,8.111 Z"></path>
                </svg>
            </button>

        </div>
    </main>
@stop

@section('css')
    <link href="/public/plugins/formstone/carousel/carousel.css" rel="stylesheet">
    <link href="/public/plugins/formstone/light.css" rel="stylesheet">
    <link href="/public/css/carousel.css" rel="stylesheet">
    <link href="/public/css/home-slider.css" rel="stylesheet">

@stop

@section('js')

    <script src={{asset("public/js/bundle/carousel.js")}}></script>
    <script src={{asset("public/plugins/formstone/core.js")}}></script>
    <script src={{asset("public/plugins/formstone/mediaquery.js")}}></script>
    <script src={{asset("public/plugins/formstone/touch.js")}}></script>
    <script src={{asset("public/plugins/formstone/carousel/carousel.js")}}></script>
    <script>
        $(document).ready(function () {
            $(".home__main-slider").carousel({
                pagination: true,
                controls: false
            });

            $(".home__main-slider-thumb").carousel({
                controls: false,
                pagination: false,
                matchWidth: false
            });
            $(".home_brands-slider").carousel({
                theme: "fs-light",
                // pagination: false,
                infinite: true,
                show: {
                    "320px": 2,
                    "980px": 3,
                    "1220px": 4,
                    "1630px": 5,
                }
            });

            // home products slider

            $(".home_products-carousel").carousel({
                theme: "fs-light",
                pagination: true,
                infinite: true,
                show: {
                    "768px": 1,
                    "900px": 2,
                    "1100px":3,
                    "1300px": 4,
                }
            });
            // home reviews slider
            $(".home_reviews-slider").carousel({
                controls: false,
                show: 1
            });

            $("body").on('change','.top-selectbox',function () {
                let key = $(this).val();
                $.ajax({
                    type: "post",
                    url: "/top-product",
                    cache: false,
                    datatype: "json",
                    data: {key: key},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            $(".home_products-carousel").html(data.html);
                            $("body").find(".home_products-carousel").carousel({
                                theme: "fs-light",
                                pagination: true,
                                infinite: true,
                                show: {
                                    "768px": 1,
                                    "900px": 2,
                                    "1100px":3,
                                    "1300px": 4,
                                }
                            });
                        }
                    }
                });
            });

            $("body").on('click','.top-link',function () {
                let key = $(this).data('key');
                $("body").find('.top-parent').removeClass('active');
                $(this).closest('.top-parent').addClass('active');

                $.ajax({
                    type: "post",
                    url: "/top-product",
                    cache: false,
                    datatype: "json",
                    data: {key: key},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            $(".home_products-carousel").html(data.html);

                            $("body").find(".home_products-carousel").carousel({
                                theme: "fs-light",
                                pagination: true,
                                infinite: true,
                                show: {
                                    "768px": 1,
                                    "900px": 2,
                                    "1100px":3,
                                    "1300px": 4,
                                }
                            });
                        }
                    }
                });
            });
//home products top list
//             let windowWidyh = $(window).width()
//
//             if(windowWidyh<=767){
//                 $(".home_products-version").carousel({
//                     // controls: false,
//                     pagination: false,
//                     show: {
//                         "557px": 2
//                     }
//                 });
//             }

        })

    </script>
@stop
