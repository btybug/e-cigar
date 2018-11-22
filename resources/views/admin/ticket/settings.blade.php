@extends('layouts.admin')
@section('content-header')

@stop

@section('content')
    <section class="content stock-page">

       <div class="panel panel-default">
           <h2 class="panel-heading mt-0">Settings</h2>

           <div class="panel-body">
               {!! Form::model($settings,[]) !!}
               <div class="text-right btn-save">
                   <a href="{!! route('admin_tickets') !!}" class="btn btn-action btn-default">Back</a>
                   {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
               </div>
               <div class="row sortable-panels">
                   <div class="col-md-7 ">
                       <div class="form-group">
                           <div class="row">
                               <div class="col-sm-12">
                                   <div class="form-group">
                                       <div class="form-group">
                                           <label>Select status - Open ticket</label>
                                           {!! Form::select('open',$statuses,null,['class'=>'form-control']) !!}
                                       </div>
                                       <div class="form-group">
                                           <label>Select status - Mark Completed</label>
                                           {!! Form::select('completed',$statuses,null,['class'=>'form-control']) !!}
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               {!! Form::close() !!}
           </div>
       </div>
    </section>
@stop
@section('css')

@stop
@section('js')

@stop