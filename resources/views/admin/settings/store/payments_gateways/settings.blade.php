@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="text" class="control-label col-xs-4">Stripe Key</label>
                <div class="col-xs-8">
                    <input id="text" name="text" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="text1" class="control-label col-xs-4">Stripe Secret</label>
                <div class="col-xs-8">
                    <input id="text1" name="text1" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-offset-4 col-xs-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@stop