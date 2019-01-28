@extends('layouts.frontend')
@section('content')
    <main class="main-content position-relative">
        <div class="d-flex">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--@include('frontend._partials.left_bar')--}}

                {{--acoount sidebar--}}
                <div class="profile-sidebar profile-sidebar--inner-pages d-flex flex-column align-items-center">
                    <ul class="profile-sidebar-menu list-unstyled mb-0 w-100">
                        <li class="profile-sidebar-menu_item active">
                            <a href="{!! route('my_account') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 22 24"
                            width="22px" height="24px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M20.454,23.292 C18.787,19.625 15.097,17.266 10.998,17.266 C6.903,17.266 3.213,19.625 1.542,23.292 L0.001,23.292 C1.184,20.274 3.596,17.879 6.674,16.685 L7.252,16.460 L6.711,16.160 C3.948,14.627 2.231,11.743 2.231,8.634 C2.231,3.874 6.163,0.002 10.998,0.002 C15.832,0.002 19.765,3.874 19.765,8.634 C19.765,11.744 18.050,14.628 15.289,16.160 L14.747,16.460 L15.325,16.685 C18.400,17.879 20.812,20.274 21.997,23.292 L20.454,23.292 ZM10.998,1.402 C6.949,1.402 3.655,4.646 3.655,8.634 C3.655,12.622 6.949,15.866 10.998,15.866 C15.049,15.866 18.344,12.622 18.344,8.634 C18.344,4.646 15.049,1.402 10.998,1.402 Z"/>
                </svg>
                </span>
                                <span class="d-inline-block">Account</span>
                            </a>
                        </li>
                        <li class="profile-sidebar-menu_item">
                            <a href="{!! route('notifications') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                                <span class="d-inline-block profile-sidebar-menu_icon">

                    <svg x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path fill="rgb(81, 132, 229)" d="M467.819,431.851l-36.651-61.056c-16.896-28.181-25.835-60.437-25.835-93.312V224
			c0-82.325-67.008-149.333-149.333-149.333S106.667,141.675,106.667,224v53.483c0,32.875-8.939,65.131-25.835,93.312
			l-36.651,61.056c-1.984,3.285-2.027,7.403-0.149,10.731c1.899,3.349,5.461,5.419,9.301,5.419h405.333
			c3.84,0,7.403-2.069,9.301-5.419C469.845,439.253,469.803,435.136,467.819,431.851z M72.171,426.667l26.944-44.907
			C118.016,350.272,128,314.219,128,277.483V224c0-70.592,57.408-128,128-128s128,57.408,128,128v53.483
			c0,36.736,9.984,72.789,28.864,104.277l26.965,44.907H72.171z"/>
	</g>
</g>
<g>
	<g>
		<path fill="rgb(81, 132, 229)" d="M256,0c-23.531,0-42.667,19.136-42.667,42.667v42.667C213.333,91.221,218.112,96,224,96s10.667-4.779,10.667-10.667
			V42.667c0-11.776,9.557-21.333,21.333-21.333s21.333,9.557,21.333,21.333v42.667C277.333,91.221,282.112,96,288,96
			s10.667-4.779,10.667-10.667V42.667C298.667,19.136,279.531,0,256,0z"/>
	</g>
</g>
<g>
	<g>
		<path fill="rgb(81, 132, 229)" d="M302.165,431.936c-3.008-5.077-9.515-6.741-14.613-3.819c-5.099,2.987-6.805,9.536-3.819,14.613
			c2.773,4.715,4.288,10.368,4.288,15.936c0,17.643-14.357,32-32,32c-17.643,0-32-14.357-32-32c0-5.568,1.515-11.221,4.288-15.936
			c2.965-5.099,1.259-11.627-3.819-14.613c-5.141-2.923-11.627-1.259-14.613,3.819c-4.715,8.064-7.211,17.301-7.211,26.731
			C202.667,488.085,226.581,512,256,512s53.333-23.915,53.376-53.333C309.376,449.237,306.88,440,302.165,431.936z"/>
	</g>
</g>
</svg>
                </span>
                                <span class="d-inline-block">Notifications</span>
                            </a>
                        </li>
                        <li class="profile-sidebar-menu_item">
                            <a href="{!! route('my_account_favourites') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 22 21"
                            width="22px" height="21px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M15.952,1.493 C18.635,1.493 20.659,3.532 20.659,6.235 C20.659,9.774 17.405,12.847 11.653,17.972 L11.624,17.999 L11.596,18.027 L11.000,18.625 L10.404,18.027 L10.376,17.999 L10.346,17.972 C4.595,12.847 1.342,9.774 1.342,6.235 C1.342,3.532 3.365,1.493 6.048,1.493 C7.514,1.493 9.020,2.201 9.978,3.342 L11.000,4.560 L12.023,3.342 C12.981,2.201 14.486,1.493 15.952,1.493 M15.952,0.144 C14.077,0.144 12.208,1.031 11.000,2.470 C9.791,1.031 7.923,0.144 6.048,0.144 C2.644,0.144 0.002,2.806 0.002,6.235 C0.002,10.450 3.740,13.886 9.459,18.983 L11.000,20.530 L12.541,18.983 C18.260,13.886 21.998,10.450 21.998,6.235 C21.998,2.806 19.356,0.144 15.952,0.144 L15.952,0.144 Z"/>
                </svg>
                </span>
                                <span class="d-inline-block">Favorites</span>
                            </a>
                        </li>
                        <li class="profile-sidebar-menu_item">
                            <a href="{!! route('my_account_orders') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 21 24"
                            width="21px" height="24px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M16.116,4.279 L16.116,0.439 L4.839,0.439 L4.839,4.279 L0.909,4.279 L0.909,23.736 L20.046,23.736 L20.046,4.279 L16.116,4.279 ZM6.158,1.706 L14.796,1.706 L14.796,4.279 L6.158,4.279 L6.158,1.706 ZM18.726,22.468 L2.228,22.468 L2.228,5.547 L4.839,5.547 L4.839,8.095 L6.158,8.095 L6.158,5.547 L14.796,5.547 L14.796,8.095 L16.116,8.095 L16.116,5.547 L18.726,5.547 L18.726,22.468 Z"/>
                </svg>
                </span>
                                <span class="d-inline-block">Orders</span>
                            </a>
                        </li>
                        <li class="profile-sidebar-menu_item">
                            <a href="{!! route('my_account_address') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 21 21"
                            width="21px" height="21px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M2.709,0.614 L2.709,3.948 L0.917,3.948 L0.917,5.239 L2.709,5.239 L2.709,10.161 L0.917,10.161 L0.917,11.452 L2.709,11.452 L2.709,16.359 L0.917,16.359 L0.917,17.650 L2.709,17.650 L2.709,20.999 L20.041,20.999 L20.041,0.614 L2.709,0.614 ZM18.769,19.818 L3.980,19.818 L3.980,17.650 L7.229,17.650 L7.229,16.359 L3.980,16.359 L3.980,11.452 L7.229,11.452 L7.229,10.161 L3.980,10.161 L3.980,5.239 L7.229,5.239 L7.229,3.948 L3.980,3.948 L3.980,1.795 L18.769,1.795 L18.769,19.818 Z"/>
                </svg>
                </span>
                                <span class="d-inline-block">Address</span>
                            </a>
                        </li>
                        <li class="profile-sidebar-menu_item">
                            <a href="{!! route('my_account_tickets') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 15 21"
                            width="15px" height="21px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M11.421,20.998 L10.105,20.998 C10.105,20.553 9.984,20.139 9.781,19.778 C9.331,19.003 8.476,18.477 7.499,18.477 C6.523,18.477 5.667,19.003 5.218,19.778 C5.015,20.139 4.894,20.553 4.894,20.998 L3.578,20.998 L-0.003,20.998 L-0.003,-0.003 L15.002,-0.003 L15.002,20.998 L11.421,20.998 ZM13.741,6.639 L12.028,6.639 L12.028,5.305 L13.741,5.305 L13.741,1.218 L1.258,1.218 L1.258,5.305 L2.970,5.305 L2.970,6.639 L1.258,6.639 L1.258,19.778 L3.792,19.778 C4.313,18.281 5.777,17.204 7.499,17.204 C9.222,17.204 10.686,18.281 11.207,19.778 L13.741,19.778 L13.741,6.639 ZM5.464,5.305 L9.534,5.305 L9.534,6.639 L5.464,6.639 L5.464,5.305 Z"/>
                </svg>
                </span>
                                <span class="d-inline-block">Tickets</span>

                            </a>
                        </li>
                    </ul>
                    <div class="mt-auto">
                        {!! Form::open(['url'=>route('logout')]) !!}
                        <div class="text-center">
                            <button type="submit" class="profile-sidebar_logout-btn d-inline-flex align-items-center justify-content-center font-14 text-uppercase text-white pointer">Logout</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>

            <div class="profile-inner-pg-right-cnt">
                <div class="profile-inner-pg-right-cnt_inner h-100">
                   <div class="row">
                       <div class="col-lg-9">
                           {{--<ul class="nav nav-pills nav-fill" role="tablist">--}}
                               {{--<li>--}}
                                   {{--<a class="btn btn-info nav-link nav-link--new-address active" id="billingAddress-tab"--}}
                                      {{--data-toggle="tab" href="#billingAddress" role="tab" aria-controls="billingAddress"--}}
                                      {{--aria-selected="true" aria-expanded="true">Billing Address</a>--}}
                               {{--</li>--}}
                               {{--<li class="active">--}}
                                   {{--<a class="btn btn-info nav-link nav-link--new-address" id="addressBook-tab"--}}
                                      {{--data-toggle="tab"--}}
                                      {{--href="#addressBook" role="tab" aria-controls="addressBook">Address Book</a>--}}
                               {{--</li>--}}
                           {{--</ul>--}}

                           <div class="tab-content">
                               {{--<div class="tab-pane fade active in show p-4" id="billingAddress" role="tabpanel"--}}
                                    {{--aria-labelledby="billingAddress-tab">--}}
                                   {{--{!! Form::model($billing_address,['class'=>'form-horizontal']) !!}--}}
                                   {{--<div class="form-group">--}}
                                       {{--<div class="row">--}}
                                           {{--<label for="text" class="control-label col-sm-4">Name</label>--}}
                                           {{--<div class="col-sm-8">--}}
                                               {{--<div class="row">--}}
                                                   {{--<div class="col-sm-6">--}}
                                                       {{--{!! Form::text('first_name',null,['class'=>'form-control']) !!}--}}
                                                   {{--</div>--}}
                                                   {{--<div class="col-sm-6">--}}
                                                       {{--{!! Form::text('last_name',null,['class'=>'form-control']) !!}--}}
                                                   {{--</div>--}}
                                               {{--</div>--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--<div class="form-group">--}}
                                       {{--<div class="row">--}}
                                           {{--<label for="text" class="control-label col-sm-4">Company name</label>--}}
                                           {{--<div class="col-sm-8">--}}
                                               {{--{!! Form::text('company',null,['class'=>'form-control']) !!}--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--<div class="form-group">--}}
                                       {{--<div class="row">--}}
                                           {{--<label for="text" class="control-label col-sm-4">1st Line address</label>--}}
                                           {{--<div class="col-sm-8">--}}
                                               {{--{!! Form::text('first_line_address',null,['class'=>'form-control']) !!}--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--<div class="form-group">--}}
                                       {{--<div class="row">--}}
                                           {{--<label for="text" class="control-label col-sm-4">2nd line address</label>--}}
                                           {{--<div class="col-sm-8">--}}
                                               {{--{!! Form::text('second_line_address',null,['class'=>'form-control']) !!}--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--<div class="form-group">--}}
                                       {{--<div class="row">--}}
                                           {{--<label for="text" class="control-label col-sm-4">Country</label>--}}
                                           {{--<div class="col-sm-8">--}}
                                               {{--{!! Form::select('country',['' => 'SELECT'] + $countries,null,['class'=>'form-control']) !!}--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--<div class="form-group hide">--}}
                                       {{--<div class="row">--}}
                                           {{--<label for="text" class="control-label col-sm-4">Regions</label>--}}
                                           {{--<div class="col-sm-8">--}}
                                               {{--{!! Form::text('region',null,['class'=>'form-control','id' => 'regions']) !!}--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--<div class="form-group hide">--}}
                                       {{--<div class="row">--}}
                                           {{--<label for="text" class="control-label col-sm-4">City</label>--}}
                                           {{--<div class="col-sm-8">--}}
                                               {{--{!! Form::text('city',null,['class'=>'form-control']) !!}--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--<div class="form-group">--}}
                                       {{--<div class="row">--}}
                                           {{--<label for="text" class="control-label col-sm-4">Post Code</label>--}}
                                           {{--<div class="col-sm-8">--}}
                                               {{--{!! Form::text('post_code',null,['class'=>'form-control']) !!}--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--{!! Form::hidden('type','billing_address') !!}--}}
                                   {{--{!! Form::hidden('id') !!}--}}
                                   {{--<div class="form-group row">--}}
                                       {{--<div class="col-sm-offset-4 col-sm-8">--}}
                                           {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                                       {{--</div>--}}
                                   {{--</div>--}}
                                   {{--{!! Form::close() !!}--}}
                               {{--</div>--}}

                                       <div>

                                           <div class="form-group row mb-5">
                                               <div class="col-md-5">
                                                   <h5>
                                                       <label for="selectAddress" class="control-label text-muted">Default Shipping Address</label>
                                                   </h5>
                                               </div>
                                               <div class="col-md-7 d-flex">
                                                   {!! Form::select('address_book',$address,($default_shipping)?$default_shipping->id:null,['class' => 'form-control edit-address']) !!}
                                                   <button type="button"
                                                           class="nav-link nav-link--new-address btn ntfs-btn address-book-new rounded-0">
                                                       + Add New
                                                   </button>
                                               </div>
                                           </div>
                                           <div class="border py-3 px-4">
                                               <div class="selected-form">
                                                   @include("frontend.my_account._partials.new_address",['address_book'=>$default_shipping,'default' => true])
                                               </div>
                                               {{--<button type="submit" class="btn btn-primary edit-address">Edit</button>--}}
                                               <div class="text-right">
                                                   <button type="button" class="btn btn-transp edit-address rounded-0">Delete</button>
                                               </div>
                                           </div>

                                       </div>

                           </div>
                       </div>
                   </div>

                </div>
            </div>
            {{--@include('frontend.my_account._partials.verify_bar.blade_old.php')--}}



        </div>
    </main>


    <div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog"
         aria-labelledby="newAddressModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Address Book</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body address-form">

                </div>
            </div>
        </div>
    </div>

@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <style>
        .errors {
            color:red;
        }
    </style>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $("body").on('click', '.save-address-book', function () {
                var form = $(".address-book-form").serialize();
                AjaxCall(
                    "/my-account/save-address-book",
                    form,
                    res => {
                    if (
                !res.error
                )
                {
                    window.location.reload();
                }
            },
                error =>
                {
                    if (error.status == 422) {
                        $('.errors').html('');
                        for (var err in error.responseJSON.errors) {
                            $('.errors').append(error.responseJSON.errors[err] + '<br>');
                        }
                    }
                }
                )
                ;
            })

            $("#country").select2();
            $("#geo_country").select2();
            function getRegionsPackage() {
                let value = $("#country").val();
                AjaxCall(
                    "/get-regions-by-country",
                    {country: value},
                    res => {
                    let select = document.getElementById('regions');
                select.innerText = null;
                if (!res.error) {
                    $.each(res.data, function (index, value) {
                        var opt = document.createElement('option');
                        opt.value = res.data[value];
                        opt.innerHTML = res.data[value];
                        select.appendChild(opt);
                    })

                }
            }
            )
                ;
            }

            $("body").on('click', '.address-book-new', function () {
                AjaxCall(
                    "/my-account/address-book-form",
                    {},
                    res => {
                    if (
                !res.error
                )
                {
                    $(".address-form").html(res.html);
                    $("#geo_country_book").select2();
                    $("#newAddressModal").modal();
                }
            }
                )
                ;
            });

            $("body").on('change', '.edit-address', function () {
                var id = $(this).val();
                AjaxCall(
                    "/my-account/address-book-form",
                    {id: id},
                    res => {
                            if (
                        !res.error
                        )
                        {
                            $(".selected-form").html(res.html);
                            $("#geo_country_book").select2();
        //                    $("#newAddressModal").modal();
                        }
                    }
                )
                ;
            });

            function getRegions() {
                let value = $("#geo_country").val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    {country: value},
                    res => {
                    let select = document.getElementById('geo_region');
                select.innerText = null;
                if (!res.error) {
                    var opt = document.createElement('option');
                    $.each(res.data, function (k, v) {
                        var option = $(opt).clone();
                        option.val(k);
                        option.text(v);
                        $(select).append(option);
                    });

                }
            }
            )
                ;
            }

            function renderAddressBook() {
                let value = $(".select-address").val();
                AjaxCall(
                    "/my-account/select-address-book",
                    {id: value},
                    res => {
                    if (
                !res.error
            )
                {
                    $(".render-address").html(res.html);
                }
            }
            )
                ;
            }

            $("body").on("change", ".select-address", function () {
                renderAddressBook();
            });

            $("body").on("change", "#country", function () {
                getRegionsPackage();
            });

            $("body").on("change", "#geo_country", function () {
                getRegions();
            });

            $("body").on("change", "#geo_country_book", function () {
                var value = $(this).val();
                let $_this = $(this);
                AjaxCall(
                    "/get-regions-by-geozone",
                    {country: value},
                    res => {
                    let select = $_this.closest('.address-book-form').find('.geo_region_book');
                    $(select).empty()
                    if (!res.error) {
                        console.log($(select).val())
                        var opt = document.createElement('option');
                        $.each(res.data, function (k, v) {
                            var option = $(opt).clone();
                            option.val(k);
                            option.text(v);
                            $(select).append(option);
                        });
                    }
            }
                )
                ;
            });
        })
    </script>
@endsection