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
            <div class="container home_width">
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
                    </div>
                    <div class="d-flex home_products-version">
                        <div class="col active">
                            <a href="#" class="products-version-link">
                                Best Offers
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="products-version-link">
                                Top Pruducts
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="products-version-link">
                                Most Sales
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="products-version-link">
                                News
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="products-version-link">
                                Category 5
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="products-version-link">
                                Category 6
                            </a>
                        </div>

                    </div>
                    <div class="products__list-wrapper home_products-carousel">
                        <div class="home_products-carousel-item">
                            <div class="products__item-wrapper main-transition">
                                <div class="products__item-wrapper-inner">
                                    <a href="#" class="products__item-top">
                                    <span
                                        class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>
{{--<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-less">-50%</span>--}}
                                    </span>
                                        <span class="products__item-main-content">
                                         <span class="products__item-photo-thumb">

<span class="products__item-photo-thumb-item active-slider">
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                                                                          <span
                                                                                              class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-4-1.png" alt="thumb">
</span>

                                        </span>
                                        <span class="products__item-content-inner">
                                            <span
                                                class="font-sec-reg font-21 text-main-clr products__item-title text-truncate">
60W SMOK² PRIV V8 Starter1
                                    </span>
                                            <span class="font-main-light font-15 products__item-desc">Lorem ipsum dolor amet, consectetur
adipiscing elit. Morbi sodales ...
                                    </span>
                                             <span
                                                 class="d-flex flex-wrap justify-content-between align-items-center products__item-price-discount">

                                              <span
                                                  class="d-flex flex-wrap align-items-center products__item-discount-all">
                                                                               <span class="products__item-discount">
    <img src="/public/img/discount-70.png" alt="discount">
</span>
                                                 <span class="products__item-discount">
                                                      <img src="/public/img/discount-50.png" alt="discount">
                                                  </span>

                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">
{{--<span class="font-sec-reg text-gray-clr font-18 align-self-end products__item-sec-price">$200</span>--}}
<span class="font-sec-bold font-24 text-tert-clr products__item-main-price">$50</span>
                                        </span>
                                    </span>
                                        </span>

                                    </span>

                                    </a>
                                    <div
                                        class="flex-wrap justify-content-between align-items-center products__item-bottom">
                                        <a href="#"
                                           class="d-flex align-items-center justify-content-center font-15 text-tert-clr text-uppercase products__item-view-more">
                                            view more
                                        </a>
                                        <span class="products__item-favourite active">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="18px"
                                            viewBox="0 0 20 18"
                                        >
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"/>
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home_products-carousel-item">
                            <div class="products__item-wrapper main-transition">
                                <div class="products__item-wrapper-inner">
                                    <a href="#" class="products__item-top">
                                    <span
                                        class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>
{{--<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-less">-50%</span>--}}
                                    </span>
                                        <span class="products__item-main-content">
                                         <span class="products__item-photo-thumb">

<span class="products__item-photo-thumb-item active-slider">
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                                                                          <span
                                                                                              class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-4-1.png" alt="thumb">
</span>

                                        </span>
                                        <span class="products__item-content-inner">
                                            <span
                                                class="font-sec-reg font-21 text-main-clr products__item-title text-truncate">
Click-N-Vape Smoke V8 Starter
                                    </span>
                                            <span class="font-main-light font-15 products__item-desc">Lorem ipsum dolor amet, consectetur
adipiscing elit. Morbi sodales ...
                                    </span>
                                             <span
                                                 class="d-flex flex-wrap justify-content-between align-items-center products__item-price-discount">

                                              <span
                                                  class="d-flex flex-wrap align-items-center products__item-discount-all">
                                                                               <span class="products__item-discount">
    <img src="/public/img/discount-70.png" alt="discount">
</span>
{{--                                                 <span class="products__item-discount">--}}
                                                  {{--    <img src="/public/img/discount-50.png" alt="discount">--}}
                                                  {{--</span>--}}

                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">
{{--<span class="font-sec-reg text-gray-clr font-18 align-self-end products__item-sec-price">$200</span>--}}
<span class="font-sec-bold font-24 text-tert-clr products__item-main-price">$50</span>
                                        </span>
                                    </span>
                                        </span>

                                    </span>

                                    </a>
                                    <div
                                        class="flex-wrap justify-content-between align-items-center products__item-bottom">
                                        <a href="#"
                                           class="d-flex align-items-center justify-content-center font-15 text-tert-clr text-uppercase products__item-view-more">
                                            view more
                                        </a>
                                        <span class="products__item-favourite active">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="18px"
                                            viewBox="0 0 20 18"
                                        >
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"/>
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home_products-carousel-item">
                            <div class="products__item-wrapper main-transition">
                                <div class="products__item-wrapper-inner">
                                    <a href="#" class="products__item-top">
                                    <span
                                        class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>
{{--<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-less">-50%</span>--}}
                                    </span>
                                        <span class="products__item-main-content">
                                         <span class="products__item-photo-thumb">

<span class="products__item-photo-thumb-item active-slider">
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                                                                          <span
                                                                                              class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-4-1.png" alt="thumb">
</span>

                                        </span>
                                        <span class="products__item-content-inner">
                                            <span
                                                class="font-sec-reg font-21 text-main-clr products__item-title text-truncate">
Click-N-Vape Smoke V8 Starter
                                    </span>
                                            <span class="font-main-light font-15 products__item-desc">Lorem ipsum dolor amet, consectetur
adipiscing elit. Morbi sodales ...
                                    </span>
                                             <span
                                                 class="d-flex flex-wrap justify-content-between align-items-center products__item-price-discount">

                                              <span
                                                  class="d-flex flex-wrap align-items-center products__item-discount-all">
                                                                               <span class="products__item-discount">
    <img src="/public/img/discount-70.png" alt="discount">
</span>
{{--                                                 <span class="products__item-discount">--}}
                                                  {{--    <img src="/public/img/discount-50.png" alt="discount">--}}
                                                  {{--</span>--}}

                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">
{{--<span class="font-sec-reg text-gray-clr font-18 align-self-end products__item-sec-price">$200</span>--}}
<span class="font-sec-bold font-24 text-tert-clr products__item-main-price">$50</span>
                                        </span>
                                    </span>
                                        </span>

                                    </span>

                                    </a>
                                    <div
                                        class="flex-wrap justify-content-between align-items-center products__item-bottom">
                                        <a href="#"
                                           class="d-flex align-items-center justify-content-center font-15 text-tert-clr text-uppercase products__item-view-more">
                                            view more
                                        </a>
                                        <span class="products__item-favourite active">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="18px"
                                            viewBox="0 0 20 18"
                                        >
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"/>
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home_products-carousel-item">
                            <div class="products__item-wrapper main-transition">
                                <div class="products__item-wrapper-inner">
                                    <a href="#" class="products__item-top">
                                    <span
                                        class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
{{--<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>--}}
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-less">-50%</span>
                                    </span>
                                        <span class="products__item-main-content">
                                         <span class="products__item-photo-thumb">

<span class="products__item-photo-thumb-item active-slider">
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                                                                          <span
                                                                                              class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-4-1.png" alt="thumb">
</span>

                                        </span>
                                        <span class="products__item-content-inner">
                                            <span
                                                class="font-sec-reg font-21 text-main-clr products__item-title text-truncate">
60W SMOK² PRIV V8 Starter1
                                    </span>
                                            <span class="font-main-light font-15 products__item-desc">Lorem ipsum dolor amet, consectetur
adipiscing elit. Morbi sodales ...
                                    </span>
                                             <span
                                                 class="d-flex flex-wrap justify-content-between align-items-center products__item-price-discount">

                                              <span
                                                  class="d-flex flex-wrap align-items-center products__item-discount-all">
{{--                                                                               <span class="products__item-discount">--}}
                                                  {{--    <img src="/public/img/discount-70.png" alt="discount">--}}
                                                  {{--</span>--}}
                                                 <span class="products__item-discount">
                                                      <img src="/public/img/discount-50.png" alt="discount">
                                                  </span>

                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">
<span class="font-sec-reg text-gray-clr font-18 align-self-end products__item-sec-price">$200</span>
<span class="font-sec-bold font-24 text-tert-clr products__item-main-price">$100</span>
                                        </span>
                                    </span>
                                        </span>

                                    </span>

                                    </a>
                                    <div
                                        class="flex-wrap justify-content-between align-items-center products__item-bottom">
                                        <a href="#"
                                           class="d-flex align-items-center justify-content-center font-15 text-tert-clr text-uppercase products__item-view-more">
                                            view more
                                        </a>
                                        <span class="products__item-favourite active">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="18px"
                                            viewBox="0 0 20 18"
                                        >
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"/>
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home_products-carousel-item">
                            <div class="products__item-wrapper main-transition">
                                <div class="products__item-wrapper-inner">
                                    <a href="#" class="products__item-top">
                                    <span
                                        class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
{{--<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>--}}
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-less">-50%</span>
                                    </span>
                                        <span class="products__item-main-content">
                                         <span class="products__item-photo-thumb">

<span class="products__item-photo-thumb-item active-slider">
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                                                                          <span
                                                                                              class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-4-1.png" alt="thumb">
</span>

                                        </span>
                                        <span class="products__item-content-inner">
                                            <span
                                                class="font-sec-reg font-21 text-main-clr products__item-title text-truncate">
60W SMOK² PRIV V8 Starter1
                                    </span>
                                            <span class="font-main-light font-15 products__item-desc">Lorem ipsum dolor amet, consectetur
adipiscing elit. Morbi sodales ...
                                    </span>
                                             <span
                                                 class="d-flex flex-wrap justify-content-between align-items-center products__item-price-discount">

                                              <span
                                                  class="d-flex flex-wrap align-items-center products__item-discount-all">
{{--                                                                               <span class="products__item-discount">--}}
                                                  {{--    <img src="/public/img/discount-70.png" alt="discount">--}}
                                                  {{--</span>--}}
                                                 <span class="products__item-discount">
                                                      <img src="/public/img/discount-50.png" alt="discount">
                                                  </span>

                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">
<span class="font-sec-reg text-gray-clr font-18 align-self-end products__item-sec-price">$200</span>
<span class="font-sec-bold font-24 text-tert-clr products__item-main-price">$100</span>
                                        </span>
                                    </span>
                                        </span>

                                    </span>

                                    </a>
                                    <div
                                        class="flex-wrap justify-content-between align-items-center products__item-bottom">
                                        <a href="#"
                                           class="d-flex align-items-center justify-content-center font-15 text-tert-clr text-uppercase products__item-view-more">
                                            view more
                                        </a>
                                        <span class="products__item-favourite active">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="18px"
                                            viewBox="0 0 20 18"
                                        >
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"/>
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home_products-carousel-item">
                            <div class="products__item-wrapper main-transition">
                                <div class="products__item-wrapper-inner">
                                    <a href="#" class="products__item-top">
                                    <span
                                        class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
{{--<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>--}}
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-less">-50%</span>
                                    </span>
                                        <span class="products__item-main-content">
                                         <span class="products__item-photo-thumb">

<span class="products__item-photo-thumb-item active-slider">
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                                                                          <span
                                                                                              class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-4-1.png" alt="thumb">
</span>

                                        </span>
                                        <span class="products__item-content-inner">
                                            <span
                                                class="font-sec-reg font-21 text-main-clr products__item-title text-truncate">
60W SMOK² PRIV V8 Starter1
                                    </span>
                                            <span class="font-main-light font-15 products__item-desc">Lorem ipsum dolor amet, consectetur
adipiscing elit. Morbi sodales ...
                                    </span>
                                             <span
                                                 class="d-flex flex-wrap justify-content-between align-items-center products__item-price-discount">

                                              <span
                                                  class="d-flex flex-wrap align-items-center products__item-discount-all">
{{--                                                                               <span class="products__item-discount">--}}
                                                  {{--    <img src="/public/img/discount-70.png" alt="discount">--}}
                                                  {{--</span>--}}
                                                 <span class="products__item-discount">
                                                      <img src="/public/img/discount-50.png" alt="discount">
                                                  </span>

                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">
<span class="font-sec-reg text-gray-clr font-18 align-self-end products__item-sec-price">$200</span>
<span class="font-sec-bold font-24 text-tert-clr products__item-main-price">$100</span>
                                        </span>
                                    </span>
                                        </span>

                                    </span>

                                    </a>
                                    <div
                                        class="flex-wrap justify-content-between align-items-center products__item-bottom">
                                        <a href="#"
                                           class="d-flex align-items-center justify-content-center font-15 text-tert-clr text-uppercase products__item-view-more">
                                            view more
                                        </a>
                                        <span class="products__item-favourite active">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="18px"
                                            viewBox="0 0 20 18"
                                        >
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"/>
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <div class="container home_width">
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
                pagination: false,
                controls: false
            });

            $(".home__main-slider-thumb").carousel({
                controls: false,
                pagination: false,
                matchWidth: false
            });
            $(".home_brands-slider").carousel({
                theme: "fs-light",
                pagination: false,
                infinite: true,
                show: {
                    "740px": 2,
                    "980px": 3,
                    "1220px": 4,
                    "1630px": 5,
                }
            });

            // home products slider

            $(".home_products-carousel").carousel({
                theme: "fs-light",
                pagination: false,
                infinite: true,
                show: {
                    "740px": 2,
                    "980px": 3,
                    "1220px": 4,
                }
            });
            // home reviews slider
            $(".home_reviews-slider").carousel({
                controls: false,
                show: 1
            });
//home products top list
            let windowWidyh = $(window).width()

            if(windowWidyh<=767){
                $(".home_products-version").carousel({
                    // controls: false,
                    pagination: false,
                    show: {
                        "557px": 2
                    }
                });
            }

        })

    </script>
@stop
