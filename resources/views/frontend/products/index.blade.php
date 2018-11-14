@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="product-page">
            <div class="d-flex flex-wrap">
                <div class="col-sm-4">
                    <div class="product-single vape-product d-flex flex-column text-center">
                        <h2 class="title">Juice</h2>
                        <div class="images">
                            <img src="/public/img/product-juice.png" alt="vapes">
                        </div>
                        <ul class="info list-unstyled">
                            <li>
                                <a href="javascript:void(0)" class="item-link txt-cl-blue cloud-link text-uppercase">
                                    Cloud
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link txt-cl-red hit-link text-uppercase">
                                    Hit
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link txt-cl-green percent-link text-uppercase">
                                    50/50
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link txt-cl-brown short-fill-link text-uppercase">
                                    Short Fill
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-single d-flex flex-column text-center">
                        <h2 class="title">Vapes</h2>
                        <div class="images">
                            <img src="/public/img/product-vape.png" alt="vapes">
                        </div>
                        <ul class="info list-unstyled">
                            <li>
                                <a href="javascript:void(0)" class="item-link">
                                    Vapes
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link">
                                    Kits
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link">
                                    All in One
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link">
                                    Three in One
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-single d-flex flex-column text-center">
                        <h2 class="title">Parts</h2>
                        <div class="images">
                            <img src="/public/img/product-part.png" alt="parts">
                        </div>
                        <ul class="info list-unstyled">
                            <li>
                                <a href="javascript:void(0)" class="item-link">
                                    Battery
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link">
                                    Accessories
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link">
                                    Other Parts
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="item-link">
                                    Other Parts
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section("js")

<script>

</script>

@stop