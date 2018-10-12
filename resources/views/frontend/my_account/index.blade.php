@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="tabs-outer">
                    <div class="text-center tabs-top">
                        <div class="img-outer">
                            <img src="http://demo0.laravelcommerce.com/resources/views/admin/images/admin_profile/1539074891.42792796_2710973195795309_228747741981835264_n.png" alt="">
                        </div>
                        <h4 class="mb-3">Name</h4>
                        <h5 class="font-weight-normal">Position</h5>
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="{!! route('my_account_profile') !!}" >Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('my_account_password') !!}" >Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('my_account_logs') !!}">Logs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{!! route('my_account_favourites') !!}">Favourites</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('my_account_orders') !!}" >My orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{!! route('shop_my_cart') !!}">My Card</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('my_account_address') !!}" >Address book
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('my_account_verification') !!}" >Verification
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">

            </div>
        </div>

    </div>

@stop