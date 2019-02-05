@extends('layouts.frontend')
@section('content')
    <main class="main-content position-relative">
        <div class="d-flex">
            {{--@include('frontend._partials.left_bar')--}}

            {{--acoount sidebar--}}
            <div class="profile-sidebar profile-sidebar--inner-pages d-flex flex-column align-items-center">
                @include('frontend.my_account._partials.left_bar')
                <div class="mt-auto">
                    {!! Form::open(['url'=>route('logout')]) !!}
                    <div class="text-center">
                        <button type="submit"
                                class="profile-sidebar_logout-btn d-inline-flex align-items-center justify-content-center font-14 text-uppercase text-white pointer">
                            Logout
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>

            <div class="profile-inner-pg-right-cnt">
                <div class="profile-inner-pg-right-cnt_inner h-100">
                    <div class="col-md-9 clearfix">
                        <div class="col-md-6 float-left">
                            <h3>Special offers</h3>
                        </div>
                        <div class="col-md-6 float-right">
                            <div class="notification-actions-bar d-none">
                                <a href="javascript:void(0)"
                                   class="btn btn-danger delete-selected-notifications">Delete</a>
                                <a href="javascript:void(0)" class="btn btn-info mark-us-read">Mark us Read</a>
                                <a href="javascript:void(0)" class="btn btn-warning mark-us-unread">Mark us Unread</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                    </div>
                </div>
            </div>
            {{--@include('frontend.my_account._partials.verify_bar.blade_old.php')--}}
        </div>
    </main>

    {{-- Modal --}}
@stop