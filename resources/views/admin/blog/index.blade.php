@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Posts</h2></div>
            <div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_blog_create') !!}">Add new</a></div>
        </div>
        <div class="col-xs-12">
            <table id="categories-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>URL</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th>Status</th>
                    <th>Tags</th>
                    <th>Added/Last Modified Date</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($posts))
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->post_url}}</td>
                        <td>{{$post->post_title}}</td>
                        <td>{{$post->short_description}}</td>
                        <td>{{$post->long_description}}</td>
                        <td>{{$post->status}}</td>
                        <td>{{$post->tags}}</td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
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