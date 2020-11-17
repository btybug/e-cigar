@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="payment_gateways_tab w-100">
        <div class="row d-flex flex-wrap">
            <div class="col-md-6">
                <h2>Categories</h2>
            </div>
            <div class="col-md-6">
                <a href="{!! route('admin_create_category_type') !!}" class="btn btn-primary float-right">Create</a>
            </div>
        </div>
        <div class="row">
            <table id="attributes-table" class="table table-style table-bordered " cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {!! $category->id !!}
                        </td>
                        <td>
                            {!! $category->name !!}
                        </td>
                        <td>
                            {!! $category->slug !!}
                        </td>
                        <td>
                            {!! $category->description !!}
                        </td>
                        <td>
                            <a href="{!! route('admin_get_category',$category->slug) !!}" class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i></a>


                            @if(! $category->is_core)
                                <a href="{!! route('admin_edit_category_type',$category->id) !!}" class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>
                                <a href="{!! route('admin_delete_category_type',$category->id) !!}" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/custom.css?v='.rand(111,999))}}">
@stop
