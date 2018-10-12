@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_verification'])
            </div>
            <div class="col-md-8">
                {!! Form::open(['file'=>true]) !!}
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="select">Document Type</label>
                    <div class="col-10">
                        <select id="verification_type" name="verification_type" class="custom-select">
                            <option value="">Select Type</option>
                            <option value="Passport">Passport</option>
                            <option value="Driving license">Driving license</option>
                            <option value="National ID">National ID</option>
                        </select>
                    </div>
                </div>
                <div class="upload d-none">
                <div class="form-group row">
                    <label for="text" class="col-2 col-form-label">Upload Image</label>
                    <div class="col-10">
                        <input id="text" name="text" type="file" class="form-control here">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-2 col-10">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@stop
@section('js')
    <script>
        $(function () {
            $('#verification_type').on('change',function () {
                if($(this).val()){
                    $('.upload').removeClass('d-none');
                }else {
                    $('.upload').addClass('d-none');
                }
            })
        })
    </script>
    @stop