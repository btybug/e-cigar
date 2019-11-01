

@extends('layouts.admin')
@section('content-header')
@stop
@section('content')



    <div class="admin-find-wrapper">

        <div class="find-form">
            @include('admin.find.items.form')
        </div>
        <div class="find-wrapper-results mt-5">


            <div class="find-wrapper-results-content row">
                @include('admin.find.items.results')
            </div>

        </div>
    </div>

@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.dataTables.css">
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.bootstrap.css">
@stop
@section('js')

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{url('public/js/DataTables/js/dataTables.editor.js')}}"></script>

    <script src="{{url('public/js/DataTables/js/editor.bootstrap4.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>

    <script src="{{url('public/js/DataTables/js/editor.bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    {!! HTML::script('/public/js/google/analytic/date-range-selector.js') !!}
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
            $("body").find(".categories").select2();
            $("body").find(".brands").select2();
            $("body").find(".barcodes").select2();
                var editor = new $.fn.dataTable.Editor({
                    ajax: "/admin/find/items",
                    table: $('body').find("#items-table"),
                    display: "bootstrap",
                    idSrc: 'id',
                    fields: [
                        {label: "ID:", name: "id", type: 'readonly'},
                        {label: "Name:", name: "name"},
                        {label: "Price:", name: "default_price"},
                        {label: "Barcode:", name: "barcodes_code",type: "select"},
                        {label: "Brand:", name: "brands",type: "select"}
                    ]
                });
            // $('#items-table').on( 'click', 'tbody td:not(:first-child)', function (e) {
            //     $('body').find('#DTE_Field_barcodes_code').select2()
            //     editor.inline( this, {
            //         onBlur: 'submit'
            //     } );
            // } );
                // $('body').find('#items-table').on('click', 'tbody td:not(:first-child)', function (e) {
                //     editor.inline(this);
                // });

                    {{$dataTable->generateScripts()}}
            @php
                use Yajra\DataTables\Html\Editor\Fields\BelongsTo;
                use Yajra\DataTables\Html\Editor\Fields\Select;
                    Select::make('barcode_id')->modelOptions(\App\Models\Barcodes::class, 'code');
                            Select::make('barcode_id')->tableOptions('items', 'barcode_id');
                            BelongsTo::model(\App\Models\Barcodes::class, 'code');
            @endphp
                });
    </script>
@stop
