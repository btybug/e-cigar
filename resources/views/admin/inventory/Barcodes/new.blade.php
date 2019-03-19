@extends('layouts.admin')
@section('content')
    <form>
        <div class="form-group row">
            <div class="col-md-8">
                <div class="row">
                    <label for="text" class="col-4 col-form-label">Code</label>
                    <div class="col-8">
                        <div class="d-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-code"></i>
                                    </div>
                                </div>
                                <input id="text" name="text" type="text" class="form-control">
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Generate</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@stop
