@extends('layouts.frontend')
@section('content')
    <main class="main-content">
        <div class="container main-max-width main-content-wrapper">
            <div class="brands-page-wrapper">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="brands-wrapper">
                            <ul class="brands-list">
                                <li class="brand-single">
                                    <a href="#" class="brand-link font-main-bold">
                                        <img src="/public/img/header-logo.png" class="brand-logo" alt="logo">
                                        <div class="brand-name">Brand name 1</div>
                                    </a>
                                </li>
                                <li class="brand-single active">
                                    <a href="#" class="brand-link font-main-bold">
                                        <img src="/public/img/maestro-logo.png" class="brand-logo" alt="logo">
                                        <div class="brand-name">Brand name 2</div>
                                    </a>
                                </li>
                                <li class="brand-single">
                                    <a href="#" class="brand-link font-main-bold">
                                        <img src="/public/img/header-logo.png" class="brand-logo" alt="logo">
                                        <div class="brand-name">Brand name 1</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-10">

                    </div>
                </div>
            </div>
        </div>

        <!--scroll top button-->
        <button id="scrollTopBtn" class="scroll-top-btn d-flex align-items-center justify-content-center pointer">
            <svg viewBox="0 0 17 10" width="17px" height="10px">
                <path fill-rule="evenodd" fill="rgb(124, 124, 124)" d="M0.000,8.111 L1.984,10.005 L8.498,3.789 L15.010,10.005 L16.995,8.111 L8.498,0.001 L0.000,8.111 Z"></path>
            </svg>
        </button>
    </main>

@stop
