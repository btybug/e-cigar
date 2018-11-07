@extends('layouts.admin')
@section('content')
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
                    <th>title</th>
                    <th>status</th>
                    <th>url</th>
                    <th>SEO title</th>
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
            $('#posts-table').DataTable({
                ajax: "{!! route('datatable_bulk_posts') !!}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'status', name: 'status'},
                    {data: 'url', name: 'url'},
                    {data: 'seo_title', name: 'seo_title'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [ [0, 'desc'] ]
            });
        });

    </script>
@stop
