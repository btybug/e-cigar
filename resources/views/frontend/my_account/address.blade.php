@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_address'])
            </div>
            <div class="col-md-8 row">
            <div class="col-md-6">
                <div class="container">
                    <h2>Billing Address</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="text" class="control-label col-xs-4">Company name</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">1st Line address</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">2nd line address</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">City</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">Country</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">Post Code</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-offset-4 col-xs-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <h2>Billing Address</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="text" class="control-label col-xs-4">Company name</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">1st Line address</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">2nd line address</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">City</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">Country</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div><div class="form-group">
                                <label for="text" class="control-label col-xs-4">Post Code</label>
                                <div class="col-xs-8">
                                    <input id="text" name="text" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-offset-4 col-xs-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <h2>Address Book</h2>
                    <div class="panel panel-default">

                        <div class="panel-body row">
                            <div class="col-md-3">
                                <div class="btn-group-vertical">
                                    <button type="button" class="btn btn-secondary">1</button>
                                    <button type="button" class="btn btn-secondary">2</button>
                                    <button type="button" class="btn btn-secondary">2</button>
                                    <button type="button" class="btn btn-secondary">2</button>
                                    <button type="button" class="btn btn-secondary">2</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                preview
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>

@stop
@section('css')
    <style>
        .btn-group-vertical .btn{
            width: 135px;
            border: 1px solid;
            margin-bottom: 3px;
        }
    </style>
    @stop