@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading clearfix">
            <h2 class="m-0 pull-left">Attributes</h2>
           @ok('admin_store_attributes_new')<div class="pull-right"><a class="btn btn-primary pull-right" href="{!! route('admin_store_attributes_new') !!}">Add new</a></div>@endok
        </div>
        <div class="card-body panel-body">
            <table id="attributes-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Icon</th>
                    <th>Is Filter</th>
                    <th>Render Style</th>
                    <th>Added/Last Modified Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Is Filter</th>
                    <th>Render Style</th>
                    <th>Added/Last Modified Date</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('#attributes-table').DataTable({
                ajax:  "{!! route('datatable_all_attributes') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'image', name: 'image'},
                    {data: 'icon', name: 'icon'},
                    {data: 'filter', name: 'filter'},
                    {data: 'display_as', name: 'display_as'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ],
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });
        });

    </script>
@stop
