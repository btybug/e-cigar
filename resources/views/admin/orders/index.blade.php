@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Orders</h2></div>
            <div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_orders_new') !!}">Add new</a></div>
        </div>
        <div class="col-xs-12">
            <table id="categories-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Long Description</th>
                    <th>Short Description</th>
                    <th>Image</th>
                    <th>Added/Last Modified Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            {{--$('#categories-table').DataTable({--}}
            {{--ajax:  "{!! route('datatable_all_categories') !!}",--}}
            {{--"processing": true,--}}
            {{--"serverSide": true,--}}
            {{--"bPaginate": true,--}}
            {{--columns: [--}}
            {{--{data: 'id',name: 'id'},--}}
            {{--{data: 'name', name: 'name'},--}}
            {{--{data: 'description',name: 'description'},--}}
            {{--{data: 'image', name: 'image'},--}}
            {{--{data: 'icon', name: 'icon'},--}}
            {{--{data: 'created_at', name: 'created_at'}--}}
            {{--]--}}
            {{--});--}}
        });

    </script>
@stop