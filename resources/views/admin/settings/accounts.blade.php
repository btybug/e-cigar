@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Accounts</a>
            </li>
        </ul>
        <div class="tab-pane fade in" id="admin_settings_accounts">
            <div class="panel panel-default">
                <div class="panel-heading">Sending Email</div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="sendingEmail">E-Mail Address</label>

                                </td>
                                <td>
                                    <input type="email" class="form-control" id="sendingEmail" aria-describedby="sendingEmail" placeholder="Enter E-Mail Address">
                                </td>
                                <td>
                                    <label for="sendingEmailDesc">Description</label>

                                </td>
                                <td>
                                    <textarea rows="5" class="form-control" id="sendingEmailDesc" aria-describedby="sendingEmailDesc" placeholder="Enter Description"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Reseiving Emails</div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="sendingEmail">E-Mail Address</label>

                                </td>
                                <td>
                                    <input type="email" class="form-control" id="reseivingEmail" aria-describedby="reseivingEmail" placeholder="Enter E-Mail Address">
                                </td>
                                <td>
                                    <label for="sendingEmailDesc">Description</label>

                                </td>
                                <td>
                                    <textarea rows="5" class="form-control" id="reseivingEmailDesc" aria-describedby="reseivingEmailDesc" placeholder="Enter Description"></textarea>
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
@stop