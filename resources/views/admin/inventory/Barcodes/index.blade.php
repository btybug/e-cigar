@extends('layouts.admin')
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading clearfix">
            <h2 class="m-0 pull-left">Barcodes</h2>
            @ok('admin_inventory_others_new')<div class="pull-right"><a class="btn btn-primary pull-right" href="{!! route('admin_inventory_barcodes_new') !!}">Add new</a></div>@endok
        </div>
        <div class="card-body panel-body">
            <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Related Item</th>
                    <th>Barcode</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script src="{!! url('public/js/jquery.printPage.js') !!}"></script>

    <script>
        $(function () {
            var table = $('#stocks-table').DataTable({
                ajax: "{!! route('datatable_all_barcodes') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf',
                    {
                        extend: "print",
                        exportOptions: {
                            stripHtml: false,
                            columns: [ 0, 1, 2,3 ]
                        }
                    }
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'code', name: 'code'},
                    {data: 'item', name: 'item'},
                    {data: 'barcode', name: 'barcode',orderable : false},
                    {data: 'actions', name: 'actions',orderable : false}
                ],
                order: [ [0, 'desc'] ]
            });
        });
    </script>
    @stop
