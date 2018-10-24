@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="m-0">Products</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="{!! route('admin_store_new') !!}">Add new</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <table id="products-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Short Description</th>
                    <th>Status</th>
                    <th>Added/Last Modified Date</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('#products-table').DataTable({
                ajax: "{!! route('datatable_all_products') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'type', name: 'type'},
                    {data: 'short_description', name: 'short_description'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop