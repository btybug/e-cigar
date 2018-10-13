@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Tags</h2></div>
            <div class="col-md-6 "><a class="btn btn-primary pull-right" href="#">Add new</a></div>
        </div>
        <div class="col-xs-12">
            <table id="attributes-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Icon</th>
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
            {{--$('#attributes-table').DataTable({--}}
                {{--ajax:  "{!! route('datatable_all_attributes') !!}",--}}
                {{--"processing": true,--}}
                {{--"serverSide": true,--}}
                {{--"bPaginate": true,--}}
                {{--columns: [--}}
                    {{--{data: 'id',name: 'id'},--}}
                    {{--{data: 'name', name: 'name'},--}}
                    {{--{data: 'image', name: 'image'},--}}
                    {{--{data: 'icon', name: 'icon'},--}}
                    {{--{data: 'created_at', name: 'created_at'},--}}
                    {{--{data: 'actions', name: 'actions'}--}}
                {{--]--}}
            {{--});--}}
        });

    </script>
@stop