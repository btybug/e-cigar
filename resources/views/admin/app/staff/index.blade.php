@extends('layouts.admin',['activePage'=>'staff'])
@section('content')
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Staff</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="px-3 my-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Select warehouse</label>
                        <div class="col-sm-4">
                            {!! Form::select('warehouse',$warehouse,$q,['class'=>'form-control','id'=>'warehouse']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="row justify-content-end">
                        <div class="col-lg-3">
                            {!! Form::select('user_id',$users,null,['class'=>'form-control','id'=>'staff_select']) !!}

                        </div>
                        <div class="col-lg-2 text-right">
                            <button class="btn btn-info staff_add">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body panel-body">
            <table id="items-table" class="table table-style table-bordered table-items-wrapper" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {

            $('#warehouse').on('change', function () {
                window.location.href = "{!! route('app_staff') !!}" + '?q=' + $(this).val();
            })


            var table = $('#items-table').DataTable({
                ajax: {
                    url: "{!! route('datatable_all_app_staff') !!}",
                    data: {warehouse_id: "{!! $q !!}"}
                },
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                // "ordering": false,
                dom: 'Bfrtip',
                'columnDefs': [{
                    'targets': 0, /* column index */
                    'orderable': false, /* true or false */

                }],
                buttons: [
                    {extend: 'csv', className: 'btn btn-primary'},
                    {extend: 'excel', className: 'btn btn-info'},
                    {extend: 'pdf', className: 'btn btn-success'},
                    {extend: 'print', className: 'btn btn-warning'}
                    {{--,{--}}
                    {{--    text: 'Create',--}}
                    {{--    action: function (e, dt, node, config) {--}}
                    {{--        window.location.href = '{!! route('app_staff_manage') !!}'--}}
                    {{--    }--}}
                    {{--}--}}
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name', name: 'status'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'gender', name: 'gender'},
                ]
            });
            $('.staff_add').on('click', function () {
                $.ajax({
                    type: "post",
                    url: "{!! route('app_staff_add') !!}",
                    cache: false,
                    datatype: "json",
                    data: {
                        warehouse_id: $('#warehouse').val(),
                        user_id: $('#staff_select').val()
                    },
                    success: function (data) {
                        if (!data.error) {
                            table.ajax.reload();
                        }

                        // return data;
                    },
                    error: function (errorThrown) {
                        if (error) {
                            error(errorThrown);
                        }
                        return errorThrown;
                    }
                });
            });
        })
    </script>
@stop
