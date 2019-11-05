@extends('layouts.admin')
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading">
            <h2 class="m-0 pull-left">Barcodes</h2>
                <span class="btn btn-success ml-2" data-toggle="modal" data-target="#barcodeModalCenter">
  Settings
</span>

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
    <!-- Modal -->
    <div class="modal fade" id="barcodeModalCenter" tabindex="-1" role="dialog" aria-labelledby="barcodeModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="barcodeModalCenterTitle">Barcode title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad amet culpa dolor eius excepturi facere illo iure
                    minima modi nihil, odio provident qui quisquam saepe suscipit vel veniam voluptatem.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
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
            //
            // JsBarcode("#barcode", text, {
            //     format: "CODE128",
            //     font: text_font,
            //     fontSize: 18,
            //     textMargin: 0,
            //     height,
            //     width,
            //     margin,
            //     backgroundColor: back_color,
            //     lineColor: line_color,
            //     textAlign: text_align
            // })
            //     .render();
        });
    </script>
    @stop
