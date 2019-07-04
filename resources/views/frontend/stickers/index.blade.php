@extends('layouts.frontend')
@section('content')
    <main class="main-content">
        <div class="brands_page-wrapper">
            <div class="brands_page-top">
                <div class="container main-max-width h-100">
                    <div class="d-flex brands_page-top-inner h-100">
                        <div class="brands_page-top-title">
                            <h1 class="font-sec-reg font-28 text-tert-clr text-uppercase">Popular Stickers</h1>
                        </div>
                        <div class="brands_page-top-slider">
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-1.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-2.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-3.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-1.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-2.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-3.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-1.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-2.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-3.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-1.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-2.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="brand-wall">
                                <div class="brand-item">
                                    <a href="#" class="brand-link">
                                        <img src="/public/img/brands/bands-3.png" alt="brand-logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="brands_main-content-wrapper">
                <div class="container main-max-width">
                    <div class="d-flex flex-wrap">
                        <div class="brands_aside">
                            <div class="select-wall">
                                {!! Form::select('sticker_filter',['' => 'All Stickers'],null,
                                ['class' => 'select-2 select-2--no-search main-select main-select-2arrows not-selected arrow-dark','style' => 'width: 100%']) !!}

                            </div>
                            <ul class="brands_aside-list">
                                @include("frontend.stickers._partials.list")
                            </ul>
                        </div>
                        <div class="brands_main-content">

                            <div class="d-flex flex-wrap brands_main-content-top margin-b-brands-top">
                                @include("frontend.stickers._partials.current")
                            </div>

                            <div class="brands_main-content-products-wrapper">
                                <div
                                    class="d-flex justify-content-between align-items-center brands_main-content-products-top">
                                    <div class="left-wrapper">
                                        <ul class="d-flex list-tabs">
                                            <li>
                                                <a href="#" class="font-sec-reg prod-link active">
                                                    E- juice
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="font-sec-reg prod-link">
                                                    Vape Kit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="font-sec-reg prod-link">
                                                    Parts
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="right-wrapper">
                                        <div
                                            class="right-head d-flex flex-wrap justify-content-lg-end justify-content-between">
                                            <div class="product-grid-list align-self-center">
                    <span class="d-inline-block products-filter-wrap_display-icons">
            <span id="dispGrid" class="d-inline-block pointer display-icon grid active">
<svg
    xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink"
    width="15px" height="15px"
    viewBox="0 0 15 15">
<path fill-rule="evenodd" fill="rgb(188, 188, 188)"
      d="M13.769,8.730 C13.090,8.730 12.539,8.179 12.539,7.500 C12.539,6.821 13.090,6.270 13.769,6.270 C14.448,6.270 14.998,6.821 14.998,7.500 C14.998,8.179 14.448,8.730 13.769,8.730 ZM13.769,2.462 C13.090,2.462 12.539,1.911 12.539,1.232 C12.539,0.553 13.090,0.003 13.769,0.003 C14.448,0.003 14.998,0.553 14.998,1.232 C14.998,1.911 14.448,2.462 13.769,2.462 ZM7.501,14.997 C6.822,14.997 6.271,14.447 6.271,13.768 C6.271,13.089 6.822,12.538 7.501,12.538 C8.180,12.538 8.730,13.089 8.730,13.768 C8.730,14.447 8.180,14.997 7.501,14.997 ZM7.501,8.730 C6.822,8.730 6.271,8.179 6.271,7.500 C6.271,6.821 6.822,6.270 7.501,6.270 C8.180,6.270 8.730,6.821 8.730,7.500 C8.730,8.179 8.180,8.730 7.501,8.730 ZM7.501,2.462 C6.822,2.462 6.271,1.911 6.271,1.232 C6.271,0.553 6.822,0.003 7.501,0.003 C8.180,0.003 8.730,0.553 8.730,1.232 C8.730,1.911 8.180,2.462 7.501,2.462 ZM1.233,14.997 C0.554,14.997 0.004,14.447 0.004,13.768 C0.004,13.089 0.554,12.538 1.233,12.538 C1.912,12.538 2.462,13.089 2.462,13.768 C2.462,14.447 1.912,14.997 1.233,14.997 ZM1.233,8.730 C0.554,8.730 0.004,8.179 0.004,7.500 C0.004,6.821 0.554,6.270 1.233,6.270 C1.912,6.270 2.462,6.821 2.462,7.500 C2.462,8.179 1.912,8.730 1.233,8.730 ZM1.233,2.462 C0.554,2.462 0.004,1.911 0.004,1.232 C0.004,0.553 0.554,0.003 1.233,0.003 C1.912,0.003 2.462,0.553 2.462,1.232 C2.462,1.911 1.912,2.462 1.233,2.462 ZM13.769,12.538 C14.448,12.538 14.998,13.089 14.998,13.768 C14.998,14.447 14.448,14.997 13.769,14.997 C13.090,14.997 12.539,14.447 12.539,13.768 C12.539,13.089 13.090,12.538 13.769,12.538 Z"/>
</svg>
            </span>
            <span id="displVertBtn" class="d-inline-block pointer list display-icon">
<svg
    width="15px" height="15px"
    viewBox="0 0 15 15">
<path fill-rule="evenodd" opacity="0.502" fill="rgb(121, 121, 121)"
      d="M0.011,15.000 L0.011,13.586 L15.004,13.586 L15.004,15.000 L0.011,15.000 ZM0.011,6.791 L15.004,6.791 L15.004,8.205 L0.011,8.205 L0.011,6.791 ZM0.011,-0.004 L15.004,-0.004 L15.004,1.410 L0.011,1.410 L0.011,-0.004 Z"/>
</svg>
            </span>
        </span>
                                            </div>
                                            <div
                                                class="sort-by_select sort-by-products d-flex align-items-center position-relative">
                                                <label for="sortBy" class="text-main-clr mb-0">SORT BY: </label>
                                                <div class="select-wall">
                                                    <select name="" id="sortBy"
                                                            class="select-filter select-2 select-2--no-search main-select main-select-2arrows products-filter-wrap_select not-selected arrow-dark"
                                                            style="100%">
                                                        <option value="">Newest</option>
                                                        <option value="">Oldest</option>
                                                        <option value="">Price high</option>
                                                        <option value="">Price low</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brands_main-content-products">
                                    <ul class="row brands_products__list-wrapper">
                                        <li class="col-md-3">
                                            <div class="products__item-wrapper main-transition">
                                                <div class="products__item-wrapper-inner">
                                                    <a href="#" class="products__item-top">
                                                        <span
                                                            class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>

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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="18px"
                                             viewBox="0 0 20 18">
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"></path>
                                        </svg>
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-3">
                                            <div class="products__item-wrapper main-transition">
                                                <div class="products__item-wrapper-inner">
                                                    <a href="#" class="products__item-top">
                                                        <span
                                                            class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>

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




                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">

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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="18px"
                                             viewBox="0 0 20 18">
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"></path>
                                        </svg>
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-3">
                                            <div class="products__item-wrapper main-transition">
                                                <div class="products__item-wrapper-inner">
                                                    <a href="#" class="products__item-top">
                                                        <span
                                                            class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-4-1.png" alt="product" class="active-slider">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>

                                    </span>
                                                        <span class="products__item-main-content">
                                         <span class="products__item-photo-thumb">

<span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                                                                          <span
                                                                                              class="products__item-photo-thumb-item active-slider">
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




                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">

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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="18px"
                                             viewBox="0 0 20 18">
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"></path>
                                        </svg>
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-3">
                                            <div class="products__item-wrapper main-transition">
                                                <div class="products__item-wrapper-inner">
                                                    <a href="#" class="products__item-top">
                                                        <span
                                                            class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">

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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="18px"
                                             viewBox="0 0 20 18">
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"></path>
                                        </svg>
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-3">
                                            <div class="products__item-wrapper main-transition">
                                                <div class="products__item-wrapper-inner">
                                                    <a href="#" class="products__item-top">
                                                        <span
                                                            class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>

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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="18px"
                                             viewBox="0 0 20 18">
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"></path>
                                        </svg>
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-3">
                                            <div class="products__item-wrapper main-transition">
                                                <div class="products__item-wrapper-inner">
                                                    <a href="#" class="products__item-top">
                                                        <span
                                                            class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-2-1.png" alt="product">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>

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




                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">

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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="18px"
                                             viewBox="0 0 20 18">
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"></path>
                                        </svg>
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-3">
                                            <div class="products__item-wrapper main-transition">
                                                <div class="products__item-wrapper-inner">
                                                    <a href="#" class="products__item-top">
                                                        <span
                                                            class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                                        <span class="position-relative products__item-photo d-block">
                                        <img src="/public/img/temp/product-4-1.png" alt="product" class="active-slider">
<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>

                                    </span>
                                                        <span class="products__item-main-content">
                                         <span class="products__item-photo-thumb">

<span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                             <span class="products__item-photo-thumb-item">
    <img src="/public/img/temp/product-3-1.png" alt="thumb">
</span>
                                                                                          <span
                                                                                              class="products__item-photo-thumb-item active-slider">
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




                                              </span>


                                        <span class="d-flex flex-wrap products__item-prices">

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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="18px"
                                             viewBox="0 0 20 18">
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"></path>
                                        </svg>
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--scroll top button-->
        <button id="scrollTopBtn" class="scroll-top-btn d-flex align-items-center justify-content-center pointer">
            <svg viewBox="0 0 17 10" width="17px" height="10px">
                <path fill-rule="evenodd" fill="rgb(124, 124, 124)"
                      d="M0.000,8.111 L1.984,10.005 L8.498,3.789 L15.010,10.005 L16.995,8.111 L8.498,0.001 L0.000,8.111 Z"></path>
            </svg>
        </button>
    </main>

@stop
@section('css')
    <link href="/public/plugins/formstone/carousel/carousel.css" rel="stylesheet">
    <link href="/public/plugins/formstone/light.css" rel="stylesheet">
    <link href="/public/css/carousel.css" rel="stylesheet">
    <link href="/public/css/home-slider.css" rel="stylesheet">

@stop

@section('js')
    <script src={{asset("public/plugins/formstone/core.js")}}></script>
    <script src={{asset("public/plugins/formstone/mediaquery.js")}}></script>
    <script src={{asset("public/plugins/formstone/touch.js")}}></script>
    <script src={{asset("public/plugins/formstone/carousel/carousel.js")}}></script>
    <script>
        $(".brands_page-top-slider").carousel({
            pagination: false,
            controls: false,
            infinite: true,
            show: {
                "740px": 2,
                "980px": 3,
                "1220px": 9
            }
        });
        $('body').on('click', '.brands_aside-item-link', function () {
            let value = $(this).data('id');
            $.ajax({
                type: "post",
                url: "/get-sticker",
                cache: false,
                datatype: "json",
                data: {id: value},
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    if (!data.error) {
                        $("body").find(".brands_aside-item-link").removeClass('active');
                        $("body").find(".brands_aside-item-link[data-id='"+value+"']").addClass('active');
                        $("body").find('.brands_main-content-top').html(data.html);

                    }
                }
            });
        });

        $('body').on('click', '.brands_main-content-top-more', function () {
            let topBlock = $(this).closest('.brands_main-content-top');
            if ($(this).hasClass('more-info-btn')) {
                $(this).toggleClass('d-flex d-none')
            } else {
                $(topBlock).find('.more-info-btn').toggleClass('d-none d-flex')
            }
            $(topBlock).find('.brands_main-content-top-info').toggleClass('d-none')
            $(topBlock).find('.brands_main-content-top-right').toggleClass('bottom-border')
            $(topBlock).toggleClass('margin-b-brands-top')

        })
        // grid brands products
        $('body').on('click', '.brands_main-content-products-top .product-grid-list .display-icon', function () {
            if ($(this).hasClass('list')) {
$(this).closest('.brands_main-content-products-wrapper').find('.brands_products__list-wrapper >li').addClass('list-product')
            }else {
                $(this).closest('.brands_main-content-products-wrapper').find('.brands_products__list-wrapper >li').removeClass('list-product')
            }
        })
    </script>
@stop
