@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Accounts</a>
            </li>
        </ul>
        <div class="nav-content">
            <div class="tab-pane fade active in">
                <div class="panel panel-default">
                    <div class="panel-heading">Basics</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="SiteName">Site Name</label>
                            <input type="text" class="form-control" id="SiteName" aria-describedby="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="siteLogo">Site Logo</label>
                            <input type="file" class="form-control" id="siteLogo">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea  class="form-control" id="description"  rows="5" aria-describedby="description" placeholder="Enter description"></textarea>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Address</div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city">City</label>
                                <select id="city" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select id="country" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-offset-1 col-md-6">
                            <div class="settings-map-outer"></div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Oppening Hours</div>
                    <div class="panel-body form-inline">
                        <div class="row">
                            <div class="col-md-7">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="weekday">Weekday</label>
                                                <select id="weekday" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="hours">From</label>
                                                <select id="hours" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>00:00</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="hours">To</label>
                                                <select id="hours" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>00:00</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Holidays</div>
                    <div class="row">
                        <div class="col-md-7">
                            <table class="table">
                                <tr>
                                    <td>
                                        <select id="calendar" class="form-control">
                                            <option selected>Calendar</option>
                                            <option>.....</option>
                                            <option>....</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Christmas">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>



                </div>

                </div>
        </div>

    </div>
@stop