@extends('layouts.admin')
@section('content')
    <div class="coupons_new_page panel panel-default">
        <div class="panel-heading">
            <h3 class="m-0">Others Form</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-8">
                {!! Form::model($model,['url' => route('post_admin_inventory_others_new'),'id' => 'form-coupon','class' => '']) !!}
                {!! Form::hidden('id') !!}
                <div class="form-group row required">
                    <label class="col-sm-2 control-label" for="input-code">
                        <span data-toggle="tooltip" title="" data-original-title="">Item</span></label>
                    <div class="col-sm-10">
                        {!! Form::select('item_id',$items,null,[ 'class'=> 'form-control select-sku']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-discount">Quantity</label>
                    <div class="col-sm-10">
                        {!! Form::number('qty',null,['placeholder' => 'Item quantity','class'=> 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="supplier">
                        Reason</label>
                    <div class="col-sm-10">
                        {!! Form::select('reason',[
                        'Lost'=>'Lost',
                        'Damaged'=>'Damaged',
                        'Returned'=>'Returned',
                        'Faulty'=>'Faulty',
                        'Shelf life'=>'Shelf life',
                        'Confiscated'=>'Confiscated',
                        'Gift'=>'Gift',
                        'Marketing or designer needs '=>'Marketing or designer needs',
                        'Admin needs'=>'Admin needs',
                        'Stolen'=>'Stolen',
                        ],null,[ 'class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="supplier">
                        Notes</label>
                    <div class="col-sm-10">
                        {!! Form::textarea('notes',null,[ 'class'=> 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-status"></label>
                    <div class="col-sm-10">
                        {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            @if($model)
                <div class="col-md-12">
                    <h3>Order History</h3>
                    <div class="col-xs-12">
                        <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Reason</th>
                                <th>Moderator</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            @endif
        </div>

    </div>
@stop

@section('js')

@if($model)
    <script>
        $(function () {
            $('#stocks-table').DataTable({
                ajax: "{!! route('datatable_all_others',$model->item_id) !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'item_id', name: 'item_id'},
                    {data: 'qty', name: 'qty'},
                    {data: 'reason', name: 'reason'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                ],
                order: [ [0, 'desc'] ]
            });
        });

    </script>
@endif

    @stop
