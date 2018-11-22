@extends('layouts.admin')

@section('content')
    @php
        $model=null
    @endphp
    <div class="col-md-12 inventory_attributes">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Status</h2>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-3 attributes-container">
                   <div class="mb-20 list-group">
                       @foreach($statuses as $status)
                           <div class="form-group row list-group-item bg-light attr-option pointer" data-item-id="{!! $status->id !!}"
                                data-parent-id="1">
                               <div class="col-md-8">
                                   {!! $status->name !!}
                               </div>
                               <div class="col-md-4 text-right">
                                   <div style="width: 20px;height: 20px;background: {{ $status->color }}"></div>
                               </div>
                           </div>
                       @endforeach
                   </div>
                    <div class="form-group row bord-top">
                        {!! Form::open(['url'=>route('post_admin_stock_statuses_manage')]) !!}
                              <input name="type" type="hidden" value="{!! $type !!}">
                            <div class="col-md-8">
                                <input class="form-control new-oreder-input"  name="translatable[gb][name]" type="text">
                            </div>
                            <div class="col-md-4 text-right">
                                <button class="btn btn-primary add-new-order"  type="submit">Add </button>
                            </div>
                        </form>
                    </div>
                </div>

                @include('admin.tools.statuses._patrials.status_form')
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-colorselector/bootstrap-colorselector.min.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop

@section("js")
    <script src="{{asset('public/admin_theme/bootstrap-colorselector/bootstrap-colorselector.min.js')}}"></script>
    <script>
        $(function() {
//            $('#colorselector_2').colorselector({
//                callback : function(value, color, title) {
//                    $("#colorValue").val(value);
//                    $("#colorColor").val(color);
//                    $("#colorTitle").val(title);
//                }
//            });
            $('#colorselector_2').colorselector();

        });
    </script>
<script>
$("body").on("click", ".attr-option", function(e) {
    e.preventDefault()
    let id = $(this).attr("data-item-id")
    AjaxCall("{!! route('post_admin_stock_statuses_manage_form') !!}", {id}, function (res) {
        if (!res.error) {
            $("body").find(".options-form").html(res.html)
            $('#colorselector_2').colorselector();
        }
    })
});

</script>
@stop
