@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <select name="category" id="" class="btn btn-info">
                <option value="" selected disabled="">Choose Category</option>
                <option value="stock">Stock</option>
                <option value="post">Post</option>
            </select>

            <input type="file" class="form-control hidden" id="exl_file" name="exl_file">
            <label for="exl_file" class="btn btn-info"><i class="fa fa-download mr-10" aria-hidden="true"></i>Choose File</label>

            <button class="btn btn-success" type="submit">
                <i class="fa fa-download" aria-hidden="true"></i>
                Import
            </button>
        </div>
    </form>

    <div class="row">
        @foreach($imports as $import)
            <div class="card col-md-2 col-sm-4">
                <div class="files">
                    <div class="delete_file text-center" data-id="{{$import["id"]}}">X</div>
                    <div class="category text-center bg-primary">{{$import["category"]}}</div>
                    @if($import["is_imported"])
                        <div class="btn btn-info import_file" data-id="{{$import["id"]}}">Imported</div>
                    @else
                        <div class="btn btn-success import_file __open_modal" data-toggle="modal" data-target="#import_modal" data-id="{{$import["id"]}}">Import</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div id="import_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {{--<div class="modal-header">--}}

                {{--</div>--}}
                <div class="modal-body">
                    <h1 class="text-center">Are You Sure to Import this file ?</h1>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success __import_file" data-id="">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>













    <style>
        .card{
            margin-bottom: 20px;
        }
        .files {
            position: relative;
            background: url("/public/img/excel.png");
            width: 100%;
            height: 200px;
            -webkit-background-size:cover;
            background-size: cover;
            border: 1px solid #227547;
        }
        .delete_file{
            position: absolute;
            display: none;
            top: -10px;
            right: -10px;
            background: red;
            color: #ffffff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
        }

        .files:hover .delete_file{
            display: block;
            cursor: pointer;
        }

        .category{
            position: absolute;
            bottom: 0;
            width: 100%;
            font-size: 18px;
            padding: 5px 0;
        }

        .import_file {
            position: absolute;
            display: none;
            right: 0;
            left: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            width: 90px;
            height: 35px;
        }

        .files:hover .import_file{
            display: block;
            cursor: pointer;
        }
        .modal-footer .btn{
            width: 49%;
        }


    </style>
@stop
@section('js')
    <script>
        $(document).ready(function () {
            $(".delete_file").click(function(){
                let id = $(this).data("id");
                console.log(id);

                $.ajax({
                    type: "post",
                    url: "/admin/import/delete-file",
                    cache: false,
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        if (!data.error) {
                            location.reload()
                        } else {
                            alert('error')
                        }
                    }
                });
            });

            $(".__open_modal").click(function(){
                let id = $(this).data("id");
                $(".__import_file").attr("data-id", id);
            });

            $(".__import_file").click(function(){
                let id = $(this).data("id");
//                console.log(id);
                $.ajax({
                    type: "post",
                    url: "/admin/import/add-file",
                    cache: false,
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        if (!data.error) {
                            location.reload()
                        } else {
                            alert('error')
                        }
                    }
                });
            })
        });
    </script>
@stop

@section("style")

@stop