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
                        <h2>Options Courier </h2>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 attributes-container">
                        @foreach($statuses as $key=>$status)
                            <div class="form-group row bord-top bg-light attr-option" data-item-id="{!! $key !!}"
                                 data-parent-id="1">
                                <div class="col-md-8">
                                    {!! $status !!}
                                </div>
                                <div class="col-md-4 text-right">

                                </div>
                            </div>
                        @endforeach
                        <div class="form-group row bord-top">
                            <form method="POST" action="#" accept-charset="UTF-8"><input name="_token" type="hidden"
                                                                                         value="UKBHve7gjHFA4dy2Q9XlXbVRF6dkzcRhlOzt49ej">
                                <input name="id" type="hidden">
                                <input name="parent_id" type="hidden" value="1">
                                <div class="col-md-8">
                                    <input class="form-control new-oreder-input"  name="translatable[gb][name]" type="text">
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-primary add-new-order"  type="button">Add </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @include('admin.inventory.statuses._patrials.status_form')
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop

@section("js")
<script>
$("body").on("click", ".attr-option", function(e) {
    e.preventDefault()
    let id = $(this).attr("data-item-id")
    AjaxCall("{!! route('post_admin_stock_statuses_manage_form') !!}", {id}, function (res) {
        if (!res.error) {
            $("body").find(".options-form").html(res.html)
        }
    })
})

$("body").on("click", ".add-new-order", function (e) {
    e.preventDefault()
    let name =     $(".new-oreder-input").val()
    AjaxCall("/url", {name}, function (res) {
        if (!res.error) {
            let html = `<div class="form-group row bord-top bg-light attr-option" data-item-id="${res.id}" data-parent-id="${res.id}">
                    <div class="col-md-8">
                        ${name}
                    </div>
                    <div class="col-md-4 text-right">

                    </div>
                </div>`
            $("body").find(".attributes-container").append(html)
            $(".new-oreder-input").val("")
        }
    })
})
</script>
@stop
