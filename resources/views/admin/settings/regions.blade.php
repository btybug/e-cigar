@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    {!! Form::open() !!}
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Accounts</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_regions') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Regions</a>
            </li>
        </ul>
        <div class="tab-pane fade in" id="admin_settings_regions">

           <div class="panel panel-default">
               <div class="panel-heading">Regions</div>

               <div class="panel-body form-horizontal">
                   {{--top 3 inputs--}}
                   <div class="row mb-20">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="siteName" class="col-sm-3 text-right">Site Name</label>
                               <div class="col-sm-9">
                                   <input type="text" id="siteName" class="form-control">
                               </div>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label for="siteLink" class="col-sm-3 text-right">Site Link</label>
                               <div class="col-sm-9">
                                   <input type="text" id="siteLink" class="form-control">
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="icon" class="col-sm-3 text-right">Icon</label>
                               <div class="col-sm-9">
                                   <input type="text" id="icon" class="form-control">
                               </div>
                           </div>
                       </div>

                   </div>

                   {{--languages--}}
                   <div class="row mb-20">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="languages" class="col-sm-3 text-right">Languages</label>
                               <div class="col-sm-7">
                                   <input type="text" id="languages" class="form-control">
                               </div>
                               <div class="col-sm-2">
                                   <button class="btn btn-danger">
                                       <i class="fa fa-plus"></i>
                                   </button>
                               </div>
                           </div>
                       </div>
                   </div>

                   {{--currency--}}
                   <div class="row">
                       <div class="col-md-3">
                           <div class="form-group">
                               <label for="currency" class="col-sm-3 text-right">Currency</label>
                               <div class="col-sm-7">
                                   <input type="text" id="currency" class="form-control">
                               </div>
                               <div class="col-sm-2">
                                   <button class="btn btn-danger">
                                       <i class="fa fa-plus"></i>
                                   </button>
                               </div>
                           </div>
                       </div>
                   </div>

               </div>

           </div>
            {{--add new item btn--}}
            <div class="text-right">
                <button class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add new item</button>
            </div>
        </div>

    </div>
    {!! Form::close() !!}
@stop