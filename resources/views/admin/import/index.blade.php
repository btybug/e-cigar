@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group text-right">
            <input type="file" class="form-control hidden" id="exl_file" name="exl_file">
            <label for="exl_file" class="btn btn-success"><i class="fa fa-download mr-10" aria-hidden="true"></i>Choose File</label>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">
                <i class="fa fa-download" aria-hidden="true"></i>
                Import
            </button>
        </div>
    </form>
@stop
@section('js')
    <script>
        $(document).ready(function () {


        });
    </script>
@stop
