@extends('layouts.admin')
@section('content')
   {!! Form::model($model,['class'=>'form-horizontal','url'=>route('post_admin_suppliers')]) !!}
        <fieldset>
{!! Form::hidden('id') !!}
            <!-- Form Name -->
            <legend>Form Name</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Name</label>
                <div class="col-md-4">
                    {!! Form::text('name',null,['class'=>'form-control input-md','id'=>'name']) !!}
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="address">Address</label>
                <div class="col-md-4">
                    {!! Form::text('address',null,['class'=>'form-control input-md','id'=>'address']) !!}
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="phone">Phone</label>
                <div class="col-md-4">
                    {!! Form::text('phone',null,['class'=>'form-control input-md','id'=>'phone']) !!}
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="company">Company</label>
                <div class="col-md-4">
                    {!! Form::text('company',null,['class'=>'form-control input-md','id'=>'company']) !!}
                </div>
            </div>     <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Email</label>
                <div class="col-md-4">
                    {!! Form::email('email',null,['class'=>'form-control input-md','id'=>'email']) !!}
                </div>
            </div>     <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="fax">Fax</label>
                <div class="col-md-4">
                    {!! Form::text('fax',null,['class'=>'form-control input-md','id'=>'fax']) !!}
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="notes">Notes</label>
                <div class="col-md-4">
                    {!! Form::textarea('notes',null,['class'=>'form-control','id'=>'notes']) !!}
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" ></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

        </fieldset>
   {!! Form::close() !!}

@stop