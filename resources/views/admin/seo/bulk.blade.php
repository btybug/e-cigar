@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo_bulk') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Posts</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo_bulk_products') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Products</a>
            </li>
        </ul>
        <div class="" id="myTabContent">
            <div class="row">

                <div class="col-xs-12">
                    <div class="col-md-6 pull-left">
                        <h2 class="m-0">{!! __('orders') !!}</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <table id="posts-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>OG title</th>
                            <th>OG image</th>
                            <th>OG description</th>
                            <th>OG Keywords</th>

                            <th>FB title</th>
                            <th>FB image</th>
                            <th>FB description</th>

                            <th>TW title</th>
                            <th>TW image</th>
                            <th>TW description</th>
                            <th>TW Keywords</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop
@section('js')
    <script>
        $(function () {
            {{--$('#posts-table').DataTable({--}}
                {{--ajax: "{!! route('datatable_bulk_posts') !!}",--}}
                {{--dom: 'Bfrtip',--}}
                {{--buttons: [--}}
                    {{--'csv', 'excel', 'pdf', 'print'--}}
                {{--],--}}
                {{--columns: [--}}
                    {{--{data: 'id', name: 'id'},--}}
                    {{--{data: 'title', name: 'title'},--}}
                    {{--{data: 'status', name: 'status'},--}}
                    {{--{data: 'url', name: 'url'},--}}
                    {{--{data: 'seo_title', name: 'seo_title'},--}}
                    {{--{data: 'actions', name: 'actions'}--}}
                {{--],--}}
                {{--order: [[0, 'desc']]--}}


            {{--});--}}
        });

    </script>
@stop
