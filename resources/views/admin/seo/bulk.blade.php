@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">General</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_seo_social') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Social</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_seo_bulk') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Bulk</a>
            </li>
        </ul>
        <div class="" id="myTabContent">

        </div>
    </div>
    @stop
