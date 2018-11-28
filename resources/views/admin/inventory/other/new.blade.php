@extends('layouts.admin')
@section('content')
    <div class="coupons_new_page">
        <h3>Others Form</h3>
        <div class="col-md-8">
            {!! Form::model($model,['url' => route('post_admin_inventory_others_new'),'id' => 'form-coupon','class' => 'form-horizontal']) !!}
            {!! Form::hidden('id') !!}
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-code">
                    <span data-toggle="tooltip" title="" data-original-title="">Item</span></label>
                <div class="col-sm-10">
                    {!! Form::select('item_id',$items,null,[ 'class'=> 'form-control select-sku']) !!}
                </div>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label class="col-sm-2 control-label" for="supplier">
                    Notes</label>
                <div class="col-sm-10">
                    {!! Form::textarea('notes',null,[ 'class'=> 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status"></label>
                <div class="col-sm-10">
                    {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop