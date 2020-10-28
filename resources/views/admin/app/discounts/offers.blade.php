@extends('layouts.admin',['activePage'=>'discounts'])
@section('content')
    <div class="d-flex flex-wrap justify-content-between w-100 admin-general--tabs-wrapper">
        <ul class="nav nav-tabs new-main-admin--tabs mb-3 admin-general--tabs" data-tabs="tabs">
            <li class="nav-item position-relative">
                <a class="nav-link "
                   href="{!! route('admin_app_products',$current->id) !!}">
                    Products
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link "
                   href="{!! route('app_staff',$current->id) !!}">
                    Staff
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link "
                   href="{!! route('admin_app_orders',$current->id) !!}">
                    Orders
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link "
                   href="{!! route('admin_app_settings',$current->id) !!}">
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{!! route("app_customer_discounts",$current->id) !!}">
                    Admin discounts
                    <div class="ripple-container"></div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{!! route("app_customer_offers",$current->id) !!}">
                    Offers
                    <div class="ripple-container"></div>
                </a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="d-flex justify-content-end px-4 mt-2">
            <a class="pull-right btn btn-primary" href="{!! route('app_customer_offers_create',$current->id) !!}">Create
                new</a>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Start date
                            </th>
                            <th>
                                End Date
                            </th>
                            <th>
                                Created Date
                            </th>
                            <th>
                                Actions
                            </th>
                            </thead>
                            <tbody>
                            @foreach($discounts as $discount)
                                <tr>
                                    <td>
                                        {!! $discount->name !!}
                                    </td>
                                    <td>
                                        {!! $discount->type !!}
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox"  value="{!! $discount->id !!}" @if($discount->status) checked @endif  class="custom-control-input" id="switch{!! $discount->id !!}">
                                            <label class="custom-control-label" for="switch{!! $discount->id !!}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        {!! $discount->start_at !!}
                                    </td>
                                    <td>
                                        {!! $discount->end_at !!}
                                    </td>
                                    <td>
                                        {!! $discount->created_at !!}
                                    </td>

                                    <td>
                                        <a href="{!! route('app_customer_offers_edit',[$discount->id,$current->id]) !!}"
                                           class="mr-3 table-edit-link">Edit</a>
                                        <a href="#" class="mr-3 table-edit-link">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function() {
            $('body').on('change', '.custom-control-input', function(ev) {
                const checked = $(ev.target).is(':checked');
                const id = $(ev.target).val();

                AjaxCall("/admin/app/discounts/offers/on-off", {id, status: checked ? 1 : 0}, function (res) {
                    if (!res.error) {

                    }
                });
            })
        })
    </script>
@stop
