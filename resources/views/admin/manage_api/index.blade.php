@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Export User </legend>

                <!-- Multiple Checkboxes -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="checkboxes">Columns</label>
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                name
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                last name
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                email
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                email verified at
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                phone
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                avatar
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                country
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="checkboxes-0">
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                gender
                            </label>
                        </div>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>
@stop
