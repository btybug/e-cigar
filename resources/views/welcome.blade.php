@extends('layouts.frontend')
@section('content')
    <main class="main-content">
        <div class="home__page-wrapper">
            <section class="home_slider-wrapper">
                <div class="home__main-slider">
                    <div>
                        <div class="main-slider-wall position-relative">
                            <img src="/public/img/slider/home-slider-big-1.jpg" alt="slider-thumb">
                            <div class="main-slider-wall-inner position-absolute">
                                <div class="text-big font-sec-reg">HOW</div>
                                <div class="text-second font-sec-bold">TO SEE THE SMOKE?</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="main-slider-wall">
                            <img src="/public/img/slider/home-slider-big-1.jpg" alt="slider-thumb">
                        </div>
                    </div>
                    <div>
                        <div class="main-slider-wall">
                            <img src="/public/img/slider/home-slider-big-1.jpg" alt="slider-thumb">
                        </div>
                    </div>
                </div>

                <div class="home__main-slider-thumb" data-carousel-controller-for=".home__main-slider">
                    <div class="thumb-wall">
                        <img src="/public/img/slider/home-slider-thumb-1.jpg" alt="slider-thumb">
                    </div>
                    <div class="thumb-wall">
                        <img src="/public/img/slider/home-slider-thumb-2.jpg" alt="slider-thumb">
                    </div>
                    <div class="thumb-wall">
                        <img src="/public/img/slider/home-slider-thumb-3.jpg" alt="slider-thumb">
                    </div>
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
                        <li class="col-md-6">
                            <div class="position-relative home_categories-item">
                                <img src="/public/img/temp/product_1.jpg" alt="photo">
                                <div class="d-flex flex-column position-absolute home_categories-item-inner">
                                    <h4 class="font-sec-bold font-35 ">VAPE KIT</h4>
                                    <p>Suspendisse at ante ac arcu elementum <br/>
                                        interdum. Nullam lorem elit.</p>
                                    <a href="#" class="btn mt-auto text-uppercase font-15 home_categories-item-btn">view
                                        products</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-6">
                            <div class="position-relative home_categories-item">
                                <img src="/public/img/temp/product_2.jpg" alt="photo">
                                <div class="d-flex flex-column position-absolute home_categories-item-inner">
                                    <h4 class="font-sec-bold font-35 ">Cbd</h4>
                                    <p>Suspendisse at ante ac arcu elementum <br/>
                                        interdum. Nullam lorem elit.</p>
                                    <a href="#" class="btn mt-auto text-uppercase font-15 home_categories-item-btn">view
                                        products</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-6">
                            <div class="position-relative home_categories-item mb-0">
                                <img src="/public/img/temp/product_3.jpg" alt="photo">
                                <div class="d-flex flex-column position-absolute home_categories-item-inner">
                                    <h4 class="font-sec-bold font-35 ">E-liquid</h4>
                                    <p>Suspendisse at ante ac arcu elementum <br/>
                                        interdum. Nullam lorem elit.</p>
                                    <a href="#" class="btn mt-auto text-uppercase font-15 home_categories-item-btn">view
                                        products</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-6">
                            <div class="position-relative home_categories-item mb-0">
                                <img src="/public/img/temp/product_4.jpg" alt="photo">
                                <div class="d-flex flex-column position-absolute home_categories-item-inner">
                                    <h4 class="font-sec-bold font-35 ">Parts</h4>
                                    <p>Suspendisse at ante ac arcu elementum <br/>
                                        interdum. Nullam lorem elit.</p>
                                    <a href="#" class="btn mt-auto text-uppercase font-15 home_categories-item-btn">view
                                        products</a>
                                </div>
                            </div>
                        </li>
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
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/1.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/2.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/3.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/4.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/5.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/1.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/2.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/3.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/1.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/2.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="brand-wall">
                        <div class="brand-item">
                            <a href="#" class="brand-link">
                                <img src="/public/img/brands/3.png" alt="brand-logo">
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container home_width">
                <section class="home_products-wrapper">
                    <h2 class="font-sec-reg home_main-title text-center"><span class="font-sec-bold">TOP</span>
                        <span>PRODUCTS</span>
                    </h2>
                    <p class="font-main-light font-15 text-center home_title-desc mb-0">Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Suspendisse lorem risus, molestie tincidunt lacus nec,
                        <br> sagittis tincidunt neque. Aenean luctus tempor libero eget ultrices. Curabitur at nibh
                        orci.
                    </p>
                    <ul class="d-flex home_products-version">
                        <li class="col active">
                            <a href="#" class="products-version-link">
                                Best Offers
                            </a>
                        </li>
                        <li class="col">
                            <a href="#" class="products-version-link">
                                Top Pruducts
                            </a>
                        </li>
                        <li class="col">
                            <a href="#" class="products-version-link">
                                Most Sales
                            </a>
                        </li>
                        <li class="col">
                            <a href="#" class="products-version-link">
                                News
                            </a>
                        </li>
                        <li class="col">
                            <a href="#" class="products-version-link">
                                Category 5
                            </a>
                        </li>
                        <li class="col">
                            <a href="#" class="products-version-link">
                                Category 6
                            </a>
                        </li>

                    </ul>
                    <ul class="row products__list-wrapper">
                        <li class="col-md-3">
                            <div class="products__item-wrapper">
                                <a href="#" class="products__item-top">
                                    <span class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">BRAND NAME</span>
                                    <span class="products__item-photo">
                                        <img src="/public/img/temp/product_1.jpg" alt="product">
<span class="products__item-new">new</span>
                                    </span>
                                    <span class="products__item-photo-thumb">
<span>
    <img src="/public/img/temp/product-2-1.png" alt="thumb">
</span>
                                    </span>
                                    <span class="products__item-title text-truncate">
Click-N-Vape Smoke V8 Starter
                                    </span>
                                    <span class="products__item-desc">
Lorem ipsum dolor amet, consectetur
adipiscing elit. Morbi sodales ...
                                    </span>
                                    <span class="products__item-price-discount">
<span class="products__item-discount">
    <img src="/public/img/discount-70.png" alt="discount">
</span>
                                        <span class="products__item-price">
<span>$50</span>
                                        </span>
                                    </span>
                                </a>
                                <div class="products__item-bottom">
                                    <a href="#" class="products__item-view-more">
                                        view more
                                    </a>
                                    <div class="products__item-favourite">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="18px"
                                            viewBox="0 0 20 18"
                                        >
                                            <path fill-rule="evenodd"  opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
        <div class="d-flex h-100">
            <div class="main-left-tabs d-flex flex-column kaliony-menu">
                <div class="nav flex-column justify-content-center nav-pills" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <a class="nav-link active d-flex flex-column align-items-center text-center"
                       id="v-pills-product-tab"
                       data-toggle="pill"
                       href="#v-pills-product" role="tab" aria-controls="v-pills-hit" aria-selected="true">
                        <span class="name">Kaliony</span></a>
                    <a class="nav-link d-flex flex-column align-items-center text-center" id="v-pills-product-tab"
                       data-toggle="pill"
                       href="#v-pills-sales" role="tab" aria-controls="v-pills-sales" aria-selected="true">
                        <span class="name">Hot Sales</span></a>
                </div>

                <div class="user-status mt-auto">
                    <span class="status-color"></span>
                    <div class="user d-flex flex-column align-items-center">
                        <svg width="42px" height="41px">
                            <path fill-rule="evenodd" opacity="0.8" fill="rgb(240, 240, 240)"
                                  d="M39.150,33.633 C35.126,31.496 32.040,30.298 29.293,29.839 L29.577,29.447 C29.712,29.312 29.780,29.110 29.712,28.907 L29.081,26.377 C29.309,26.052 29.525,25.717 29.728,25.373 C32.240,24.516 33.510,23.069 33.724,20.938 C34.827,20.881 35.779,19.894 35.779,18.781 L35.779,13.717 C35.779,12.609 34.899,11.626 33.745,11.561 C33.597,7.661 31.880,0.013 20.949,0.013 C10.018,0.013 8.301,7.661 8.153,11.561 C7.059,11.626 6.119,12.546 6.119,13.717 L6.119,18.781 C6.119,19.928 7.130,20.941 8.343,20.941 L9.354,20.941 C9.726,20.941 10.083,20.834 10.394,20.651 C10.777,22.683 11.620,24.682 12.817,26.376 L12.186,28.907 C12.186,29.042 12.186,29.245 12.321,29.447 L12.605,29.839 C9.858,30.298 6.772,31.496 2.748,33.633 C1.468,34.240 0.726,35.523 0.726,36.941 L0.726,39.844 C0.726,40.249 0.996,40.519 1.400,40.519 L17.578,40.519 L17.848,40.519 L24.050,40.519 L24.319,40.519 L40.498,40.519 C40.902,40.519 41.172,40.249 41.172,39.844 L41.172,36.941 C41.172,35.591 40.363,34.308 39.150,33.633 ZM20.953,32.089 L22.567,35.793 L19.309,35.793 L20.953,32.089 ZM18.819,37.143 L23.077,37.143 L23.471,39.169 L18.414,39.169 L18.819,37.143 ZM28.027,27.692 L28.297,28.907 L27.608,29.854 C27.564,29.890 27.523,29.934 27.488,29.987 L24.684,33.876 L23.794,35.099 L21.977,31.004 C24.193,30.733 26.167,29.602 27.750,27.981 C27.843,27.886 27.936,27.790 28.027,27.692 ZM30.659,23.492 C31.039,22.566 31.326,21.603 31.507,20.632 C31.764,20.788 32.056,20.892 32.371,20.927 C32.254,21.881 31.831,22.782 30.659,23.492 ZM34.363,13.650 L34.363,18.713 C34.363,19.118 34.026,19.523 33.555,19.523 L32.543,19.523 C32.139,19.523 31.734,19.186 31.734,18.713 L31.734,18.240 L31.734,13.650 C31.734,13.245 32.072,12.840 32.543,12.840 L33.555,12.840 C33.959,12.840 34.363,13.177 34.363,13.650 ZM20.949,1.363 C25.104,1.363 32.097,2.721 32.397,11.568 C32.115,11.597 31.844,11.683 31.600,11.815 C30.779,6.674 26.304,2.713 20.949,2.713 C15.595,2.713 11.120,6.673 10.299,11.813 C10.058,11.682 9.788,11.596 9.501,11.568 C9.801,2.721 16.794,1.363 20.949,1.363 ZM10.096,18.713 C10.096,19.118 9.759,19.523 9.287,19.523 L8.276,19.523 C7.871,19.523 7.467,19.186 7.467,18.713 L7.467,13.650 C7.467,13.245 7.804,12.840 8.276,12.840 L9.287,12.840 C9.692,12.840 10.096,13.177 10.096,13.650 L10.096,18.713 ZM11.512,13.515 C11.512,8.316 15.758,4.063 20.949,4.063 C26.140,4.063 30.386,8.316 30.386,13.515 L30.386,18.240 C30.386,20.474 29.806,22.519 28.864,24.244 C27.255,24.712 24.941,24.991 21.623,24.991 C21.219,24.991 20.949,25.262 20.949,25.667 C20.949,26.072 21.219,26.342 21.623,26.342 C24.052,26.342 26.083,26.192 27.747,25.880 C27.705,25.921 27.664,25.963 27.623,26.004 C27.283,26.457 26.926,26.870 26.552,27.242 C24.964,28.723 23.071,29.620 21.247,29.709 C21.155,29.670 21.052,29.650 20.949,29.650 C20.845,29.650 20.752,29.670 20.668,29.710 C19.552,29.659 18.409,29.304 17.325,28.698 C16.228,28.066 15.196,27.156 14.275,26.004 C14.208,25.937 14.141,25.869 14.073,25.802 L14.034,25.788 C12.520,23.800 11.512,21.184 11.512,18.240 L11.512,13.515 L11.512,13.515 ZM19.921,31.004 L18.104,35.099 L17.214,33.876 L14.410,29.987 C14.389,29.966 14.365,29.945 14.340,29.924 L13.601,28.907 L13.871,27.692 C13.962,27.790 14.055,27.886 14.148,27.981 C15.731,29.602 17.705,30.733 19.921,31.004 ZM2.074,36.941 C2.074,36.063 2.546,35.253 3.355,34.848 C7.652,32.562 10.745,31.415 13.500,31.072 L17.523,36.611 L17.012,39.169 L2.074,39.169 L2.074,36.941 ZM39.824,39.169 L24.886,39.169 L24.375,36.611 L28.441,31.012 C31.187,31.427 34.336,32.573 38.543,34.781 C39.352,35.253 39.824,36.063 39.824,36.941 L39.824,39.169 L39.824,39.169 Z"/>
                        </svg>
                        <span class="status">Online</span>
                    </div>
                </div>

            </div>

            <div class="main-right-wrapp d-flex flex-wrap">
                <div class="tab-content h-100 w-100" id="v-pills-tabContent">
                    <div class="tab-pane h-100 fade show active" id="v-pills-product" role="tabpanel"
                         aria-labelledby="v-pills-product-tab">
                        <div class="sliders home-sliders">
                            <div class="carousel_1">
                                <div>
                                    <div class="info p-0 m-0 slider-logo w-100">
                                        <img src="/public/img/header-logo.png" class="header-logo-img" alt="">
                                        <img src="/public/img/header-logo-text.png" class="header-logo-text-img" alt="">
                                        {!! filter_button('select-e-juice','5c9de18ab11d4','FILTER','filter',true,'popup') !!}
                                    </div>

                                    <img src="/public/img/temp/homepage-bg.jpg" alt="">
                                </div>

                                <div>
                                    <div class="info">
                                        <span class="title">
                                        THE BEST VAPE
                                    </span>
                                    </div>
                                    <img src="http://resourcemagonline.com/wp-content/uploads/2015/01/smoke-photo.jpg"
                                         alt="">
                                </div>
                                <div><img src="/public/img/temp/homepage-bg.jpg" alt=""></div>
                            </div>

                            <div class="carousel_2" data-carousel-controller-for=".carousel_1">
                                <div><img src="/public/img/temp/homepage-bg.jpg" alt=""></div>
                                <div><img src="http://resourcemagonline.com/wp-content/uploads/2015/01/smoke-photo.jpg"
                                          alt=""></div>
                                <div><img src="/public/img/temp/homepage-bg.jpg" alt=""></div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane h-100 fade" id="v-pills-sales" role="tabpanel"
                         aria-labelledby="v-pills-product-tab">
                        <div class="container p-4">
                            <h2 class="mb-5 text-center">Here are our Hot Sales Products</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="/public/img/temp/product-1.jpg"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Product title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                            <a href="#" class="btn bg-cl-red text-white">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="/public/img/temp/product-1.jpg"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Product title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                            <a href="#" class="btn bg-cl-red text-white">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="/public/img/temp/product-1.jpg"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Product title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                            <a href="#" class="btn bg-cl-red text-white">Checkout</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>

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
                "1220px": 5
            }
        });
    </script>
@stop
