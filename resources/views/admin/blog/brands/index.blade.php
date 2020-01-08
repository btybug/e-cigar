@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading d-flex flex-wrap justify-content-between align-items-center">
            <h2 class="m-0 pull-left">Brands</h2>
            @ok('admin_blog_brands_create') <div class=""><a class="btn btn-primary pull-right" href="{!! route('admin_blog_brands_create') !!}">Add new</a></div>@endok
        </div>
        <div class="card-body panel-body">

            <table id="posts-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('js')
@stop
@section('css')

@stop
