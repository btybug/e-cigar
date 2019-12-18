@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Columns</th>
                    @foreach($items as $item)
                        <th>{{ $item->name }}</th>
                    @endforeach
                </tr>
                </thead>
                {!! Form::open(['id' => 'rowsEditForm']) !!}
                <tbody>
                    <tr>
                        <td>
                            Product Name
                        </td>
                        @foreach($items as $item)
                            <td>
                                {!! Form::text("items[$item->id][name]",$item->name,['class'=>'form-control']) !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>
                            Price
                        </td>
                        @foreach($items as $item)
                            <td>
                                {!! Form::number("items[$item->id][default_price]",$item->default_price,['class'=>'form-control','min'=>0,'step'=>0.01]) !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>
                            Brand
                        </td>
                        @foreach($items as $item)
                            <td>
                                {!! Form::select("items[$item->id][brand_id]",$brands,$item->brand_id,['class'=>'custom-select','style' => 'width:100%']) !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>
                            Categories
                        </td>
                        @foreach($items as $item)
                            <td>
                                {!! Form::select("items[$item->id][categories][]",$categories,$item->categories()->pluck('id','id'),['class'=>'custom-select','style' => 'width:100%','multiple'=>true]) !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>
                            Status
                        </td>
                        @foreach($items as $item)
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
                        @endforeach
                    </tr>
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
    <script>
        $('.custom-select').select2();

        $("body").on('click',".saveRows",function () {
            let form = $('#rowsEditForm').serialize();

            AjaxCall("{!! route('post_admin_items_edit_row_many_save') !!}", form, function (res) {
                if (!res.error) {
                    window.location.href = "/admin/inventory/items";
                }
            });
        })
    </script>
@stop
