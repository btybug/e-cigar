@extends('layouts.frontend')
@section('content')
    <main class="main-content position-relative">
        <div class="my-account--selects">
            <div class="simple_select_wrapper">
                <select id="accounts--selects"
                        class="select-2 select-2--no-search main-select main-select-2arrows not-selected arrow-dark"
                        style="width: 100%">
                    <option value="{!! route('my_account') !!}">Account</option>
                    <option value="{!! route('notifications') !!}">Notifications</option>
                    <option value="{!! route('my_account_favourites') !!}">Favorites</option>
                    <option value="{!! route('my_account_orders') !!}">Orders</option>
                    <option value="{!! route('my_account_address') !!}">Address</option>
                    <option value="{!! route('my_account_tickets') !!}">Tickets</option>
                    <option value="{!! route('my_account_referrals') !!}">Referals</option>
                    <option value="{!! route('my_account_special_offers') !!}">Special Offers</option>
                    <option value="">Address</option>
                </select>
                {{--<select id="accounts"--}}
                {{--class="select-2 select-2--no-search main-select main-select-2arrows products-filter-wrap_select not-selected arrow-dark" style="width: 100%">--}}
                {{--<option value="{!! route('my_account') !!}">Account</option>--}}
                {{--<option>Brandos</option>--}}
                {{--<option>Eleaf</option>--}}
                {{--</select>--}}
            </div>
        </div>
        <div class="d-flex">

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
                            <h3>Notifications</h3>
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
                        <table class="table table-striped table-ntfs">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Notification</th>
                                <th scope="col">Type</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="notification-list">
                            @include('frontend.my_account._partials.notification_list')
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            {{--@include('frontend.my_account._partials.verify_bar.blade_old.php')--}}
        </div>
    </main>

    {{-- Modal --}}
    <div class="modal" id="notif_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">
                    <button type="button" class="ntfs-btn btn btn-info rounded-0" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@stop

@section("js")
    <script src={{asset("public/js/my-account/notifications.js")}}></script>
    <script>
        $("body").on('change', '.message-checkbox', function () {
            var notifications = [];
            $.each($("input[name='notifications']:checked"), function () {
                notifications.push($(this).val());
            });

            if (notifications.length > 0) {
                $(".notification-actions-bar").removeClass('d-none').addClass('d-flex')
            } else {
                $(".notification-actions-bar").removeClass('d-flex').addClass('d-none')
            }
        });

        $("body").on('click', '.mark-us-read', function () {
            var notifications = [];
            $.each($("input[name='notifications']:checked"), function () {
                notifications.push($(this).val());
            });

            if (notifications.length > 0) {
                $.ajax({
                    type: "post",
                    url: "/my-account/mark-us-read-notifications",
                    cache: false,
                    datatype: "json",
                    data: {ids: notifications},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            $("#notification-list").html(data.html);
                            $(".notification-actions-bar").removeClass('d-flex').addClass('d-none')
                        } else {
                            alert('error')
                        }
                    }
                });
            }
        });

        $("body").on('click', '.mark-us-unread', function () {
            var notifications = [];
            $.each($("input[name='notifications']:checked"), function () {
                notifications.push($(this).val());
            });

            if (notifications.length > 0) {
                $.ajax({
                    type: "post",
                    url: "/my-account/mark-us-unread-notifications",
                    cache: false,
                    datatype: "json",
                    data: {ids: notifications},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            $("#notification-list").html(data.html);
                            $(".notification-actions-bar").removeClass('d-flex').addClass('d-none')
                        } else {
                            alert('error')
                        }
                    }
                });
            }
        })

        $("body").on('click', '.delete-selected-notifications', function () {
            var notifications = [];
            $.each($("input[name='notifications']:checked"), function () {
                notifications.push($(this).val());
            });

            if (notifications.length > 0) {
                $.ajax({
                    type: "post",
                    url: "/my-account/delete-notifications",
                    cache: false,
                    datatype: "json",
                    data: {ids: notifications},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            $("#notification-list").html(data.html);
                            $(".notification-actions-bar").removeClass('d-flex').addClass('d-none')
                        } else {
                            alert('error')
                        }
                    }
                });
            }
        })
    </script>
@stop