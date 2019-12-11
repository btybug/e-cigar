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
                                {!! Form::select('warehouse',$warehouse,null,['class'=>'form-control','id'=>'warehouse']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="row justify-content-end">
                            <div class="col-lg-3">
                                <select name="" id="" class="form-control">
                                    <option value="">Add Staff member</option>
                                    <option value="">staff 1</option>
                                    <option value="">staff 2</option>
                                </select>
                            </div>
                            <div class="col-lg-2 text-right">
                                <button class="btn btn-info">Add</button>
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
                        <th>Address</th>
                        <th>Role</th>
                        <th>Shop</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Family status</th>
                        <th>Hired At</th>
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
            $('#items-table').DataTable({
                ajax: {
                    url:"{!! route('datatable_all_app_staff') !!}",
                    data:{warehouse_id:$('#warehouse').val()},

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
                    {extend: 'print', className: 'btn btn-warning'},
                    {
                        text: 'Create',
                        action: function (e, dt, node, config) {
                            window.location.href = '{!! route('app_staff_manage') !!}'
                        }
                    }
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name', name: 'status'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'gender', name: 'gender'},
                    {data: 'address', name: 'address'},
                    {data: 'role_id', name: 'role_id'},
                    {data: 'shop_id', name: 'shop_id'},
                    {data: 'rating', name: 'rating'},
                    {data: 'status', name: 'status'},
                    {data: 'family_status', name: 'family_status'},
                    {data: 'hired_at', name: 'hired_at'},
                    {data: 'actions', name: 'actions'},
                ]
            });
        })
    </script>
@stop
