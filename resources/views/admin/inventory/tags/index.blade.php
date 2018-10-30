@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="inventory_tags">
        <form id="form-tags" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-8">
                    <input type="text" id="add-new-tags" class="form-control " placeholder="Add new tags" required>
                </div>
                <div class="col-sm-4 text-right">
                    <button type="submit" class="btn btn-submit btn-primary">Add new Tag</button>
                </div>
            </div>
        </form>
        <div class="container-fluid">
            <div class="tags row">

            </div>
        </div>
    </div>
@stop
@section("css")
    <link rel="stylesheet"
          href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <!-- <script>
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

        </script> -->
    <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/public/js/custom/tags.js"></script>
@stop