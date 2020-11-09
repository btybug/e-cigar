@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading d-flex flex-wrap justify-content-between align-items-center">
            <h2 class="m-0 pull-left">Plugins</h2>
        </div>
        <div class="card-body panel-body pt-0">
            <div class="row flex-wrap d-flex">
                <div class="col-md-3 m-2" style="border: 1px solid;min-height: 200px;background: #ffffff;">
                    <div class="row text-center m-2" style="min-height: 140px;">
                        <h4>
                            Post & Comments
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button>Enable/Disable</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 m-2" style="border: 1px solid;min-height: 200px;background: #ffffff;">
                    <div class="row text-center m-2" style="min-height: 140px;">
                        <h4>
                           FAQ
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button>Enable/Disable</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 m-2" style="border: 1px solid;min-height: 200px;background: #ffffff;">
                    <div class="row text-center m-2" style="min-height: 140px;">
                        <h4>
                            Contact US
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button>Enable/Disable</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 m-2" style="border: 1px solid;min-height: 200px;background: #ffffff;">
                    <div class="row text-center m-2" style="min-height: 140px;">
                        <h4>
                            Tickets
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button>Enable/Disable</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 m-2" style="border: 1px solid;min-height: 200px;background: #ffffff;">
                    <div class="row text-center m-2" style="min-height: 140px;">
                        <h4>
                            Stores
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button>Enable/Disable</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')

@stop

@section("style")

@stop
