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
                <div class="col-md-12">
                    <div class="form-horizontal float-right">

                        <div class="form-group row">
                            <label class="col-md-6 control-label" for="customer_number">Your customer number</label>
                            <div class="col-md-6">
                                <input readonly id="customer_number" value="{!! $user->customer_number !!}"  type="text"  class="form-control input-md">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-inner-pg-right-cnt_inner h-100">

                    <div class="col-md-9 clearfix">
                        <div class="col-md-6 float-left">
                            <h3>Referrals</h3>
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Referred user</th>
                                <th scope="col">Active</th>
                                <th scope="col">Offers</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->referrals as $referral)
                                <tr>
                                    <td>{!! $referral->name.' '.$referral->name !!}</td>

                                    <td>{!! $referral->orders()->count()?'YES':'NO' !!}</td>
                                    <td>{!! $referral->orders()->count()?'<a href="javascript:void(0)">claim offer</a>':'Pending' !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@stop