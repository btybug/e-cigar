@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div><h3>Stock Multiple Edit</h3></div>
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Short description</th>
                    <th>Long description</th>
                    <th>Brand</th>
                    <th>Categories</th>
                    <th>Status</th>
                </tr>
                </thead>
                {!! Form::open(['id' => 'rowsEditForm']) !!}
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                {!! Form::text("items[$item->id][name]",$item->name,['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::text("items[$item->id][short_description]",$item->short_description,['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::textarea("items[$item->id][long_description]",$item->long_description,['class'=>'form-control long-description']) !!}
                            </td>

                            <td>
                                {!! Form::select("items[$item->id][brand_id]",$brands,$item->brand_id,['class'=>'custom-select','style' => 'width:100%']) !!}
                            </td>
                            <td>
                                {!! Form::select("items[$item->id][categories][]",$categories,$item->categories()->pluck('id','id'),['class'=>'custom-select','style' => 'width:100%','multiple'=>true]) !!}
                            </td>
                            <td>
                                <div class="custom-control custom-radio custom-control-inline">
                                    {!! Form::radio("items[$item->id][status]",1,($item->status == 1)?true:false,['class'=>'','id'=>$item->id.'_published']) !!}
                                    <label for="{!! $item->id !!}_published'" class="">Published</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    {!! Form::radio("items[$item->id][status]",0,($item->status == 0)?true:false,['class'=>'','id'=>$item->id.'_draft']) !!}
                                    <label for="{!! $item->id !!}_draft" class="">Draft</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {!! Form::close() !!}
                </tbody>
                <tfoot>
                 <tr>
                     <td colspan="5">
                         <button type="button" class="saveRows btn btn-primary float-right">Save</button>
                     </td>
                 </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop
@section('css')
    <link href="/public/plugins/select2/select2.min.css" rel="stylesheet"/>
@stop
@section('js')
    <script src="/public/plugins/select2/select2.full.min.js"></script>
    <script src="/public/js/tinymce/tinymce.min.js"></script>
    <script>
        $('.custom-select').select2();

        $("body").on('click',".saveRows",function () {
            let form = $('#rowsEditForm').serialize();

            AjaxCall("{!! route('post_admin_stock_edit_row_many_save') !!}", form, function (res) {
                if (!res.error) {
                    window.location.href = "/admin/stock";
                }
            });
        })

        $(function () {
            tinymce.init({
                selector: ".long-description",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        })
    </script>
@stop
