@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h2 class="m-0 pull-left">{!! __('Channels') !!}</h2>
            <div class="pull-right">

                <a href="{!! route('admin_sale_channels_create') !!}" type="button" class="btn btn-warning pull-right" >
                    Create New Channel
                </a>
            </div>
        </div>
        <div class="panel-body">
            <table id="orders-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Client ID</th>
                    <th>Name</th>
                    <th>Secret</th>
                    <th>URL</th>
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
          var table=  $('#orders-table').DataTable({
                ajax: "{!! route('datatable_all_channels') !!}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'secret', name: 'secret'},
                    {data: 'url', name: 'url'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[0, 'desc']]
            });
            {{--$('body').on('click', '#create-channel', function () {--}}
                {{--let data = $('form').serialize();--}}
                {{--$.ajax({--}}
                    {{--type: "post",--}}
                    {{--url: "{!! route('admin_sale_create_channels') !!}",--}}
                    {{--cache: false,--}}
                    {{--datatype: "json",--}}
                    {{--data: data,--}}
                    {{--headers: {--}}
                        {{--"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")--}}
                    {{--},--}}
                    {{--success: function (data) {--}}
                        {{--console.log(data);--}}
                      {{--if(!data.error){--}}
                          {{--$('button.close').click()--}}
                          {{--table.ajax.reload();--}}
                      {{--}--}}
                    {{--},--}}
                    {{--error: function (errorThrown) {--}}
                        {{--if (error) {--}}
                            {{--error(errorThrown);--}}
                        {{--}--}}
                        {{--return errorThrown;--}}
                    {{--}--}}
                {{--});--}}
            {{--})--}}

        });

    </script>
@stop