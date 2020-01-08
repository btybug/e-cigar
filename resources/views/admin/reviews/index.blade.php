@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading clearfix">
            <div class="panel-heading clearfix">
                <h2 class="m-0 pull-left">Reviews</h2>
                <div class="pull-right">
                </div>
            </div>
        </div>
        <div class="card-body panel-body">
            <table id="posts-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Item</th>
                    <th>Summary</th>
                    <th>Review</th>
                    <th>Rate</th>
                    <th>Nickname</th>
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
            {{--$('#posts-table').DataTable({--}}
            {{--    ajax: "{!! route('datatable_tickets') !!}",--}}
            {{--    "processing": true,--}}
            {{--    "serverSide": true,--}}
            {{--    "bPaginate": true,--}}
            {{--    "scrollX": true,--}}
            {{--    dom: 'Bflrtip',--}}
            {{--    displayLength: 10,--}}
            {{--    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],--}}
            {{--    buttons: [--}}
            {{--        'csv', 'excel', 'pdf', 'print'--}}
            {{--    ],--}}
            {{--    columns: [--}}
            {{--        {data: 'id', name: 'id'},--}}
            {{--        {data: 'user_id', name: 'user_id'},--}}
            {{--        {data: 'subject', name: 'subject'},--}}
            {{--        {data: 'summary', name: 'summary'},--}}
            {{--        {data: 'status_id', name: 'status_id'},--}}
            {{--        {data: 'category_id', name: 'category_id'},--}}
            {{--        {data: 'priority_id', name: 'priority_id'},--}}
            {{--        {data: 'tags', name: 'tags'},--}}
            {{--        {data: 'attachments', name: 'attachments'},--}}
            {{--        {data: 'created_at', name: 'created_at'},--}}
            {{--        {data: 'actions', name: 'actions'}--}}
            {{--    ]--}}
            {{--});--}}
        });

    </script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
