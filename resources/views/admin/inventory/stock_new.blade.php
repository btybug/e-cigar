@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <section class="content-header">
        <h1> Admin Profile </h1>
        <ol class="breadcrumb">
            <li><a href="http://demo0.laravelcommerce.com/admin/dashboard/this_month"><i class="fa fa-dashboard"></i>
                    Dashboard</a></li>
            <li class="active">Admin Profile</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary mar-0">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="http://demo0.laravelcommerce.com/resources/views/admin/images/admin_profile/1539074891.42792796_2710973195795309_228747741981835264_n.png"
                             alt="Václav profile picture">

                        <h3 class="profile-username text-center">Václav Kutiš</h3>

                        <p class="text-muted text-center">Administrator</p>

                        <!-- <ul class="list-group list-group-unbordered">
                           <li class="list-group-item">
                             <b>Followers</b> <a class="pull-right">1,322</a>
                           </li>
                           <li class="list-group-item">
                             <b>Following</b> <a class="pull-right">543</a>
                           </li>
                           <li class="list-group-item">
                             <b>Friends</b> <a class="pull-right">13,287</a>
                           </li>
                         </ul>

                         <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <ul class="nav nav-tabs admin-profile-left">
                    <li class="active"><a data-toggle="tab" href="#basic">Basic Details</a></li>
                    <li><a data-toggle="tab" href="#media">Media</a></li>
                    <li><a data-toggle="tab" href="#attributes">Attributes</a></li>
                    <li><a data-toggle="tab" href="#options">Options</a></li>
                </ul>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="basic" class="tab-pane fade basic-details-tab in active">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="basic-center basic-wall">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="" class="form-horizontal">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="product_name" class="control-label col-sm-4">Product name</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" name="product_name" id="product_name" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="product_id" class="control-label col-sm-4">Product ID</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" name="product_id" id="product_id" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="sku" class="control-label col-sm-4">SKU</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" name="sku" id="sku" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="sku" class="control-label col-sm-4">Barcode</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-control">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <fieldset>
                                                        <legend>Packaging Size</legend>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="packaging_length" class="control-label col-sm-4">Length</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="packaging_length" id="packaging_length" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="packaging_width" class="control-label col-sm-4">Width</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="packaging_width" id="packaging_width" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="packaging_height" class="control-label col-sm-4">Height</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="packaging_height" id="packaging_height" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label for="packaging_weight" class="control-label col-sm-4">Weight</label>
                                                                <div class="col-sm-8">
                                                                    <input class="form-control" name="packaging_weight" id="packaging_weight" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>


                                                </form>

                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="media" class="tab-pane basic-details-tab fade">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list">
                                            <ul>
                                                <li><a href="#">Feature image</a></li>
                                                <li><a href="#">Other images</a></li>
                                                <li><a href="#">Videos</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="basic-center basic-wall">
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="basic-right basic-wall">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="attributes" class="tab-pane basic-details-tab fade">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list">
                                            <ul>
                                                @if(count($attributes))
                                                    @foreach($attributes as $attribute)
                                                        <li data-id="{{ $attribute->id }}" class="option-elm"><a
                                                                    href="#">{{ $attribute->name }}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="button-add text-center">
                                            <a href="#" class="btn btn-info btn-block"><i class="fa fa-plus"></i>Add new
                                                option</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="basic-center basic-wall">
                                        <ul class="choset-attributes">


                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="basic-right basic-wall">
                                        <ul class="list">
                                            <li><a href="#">Apple</a></li>
                                            <li><a href="#">Banana</a></li>
                                            <li><a href="#">Strawbery</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="options" class="tab-pane fade">
                        options
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
<script>
    window.AjaxCall = function postSendAjax(url, data, success, error) {
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                datatype: "json",
                data: data,
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data) {
                    if (success) {
                        success(data);
                    }
                    return data;
                },
                error: function(errorThrown) {
                    if (error) {
                        error(errorThrown);
                    }
                    return errorThrown;
                }
            });
        };
$("body").on("click", ".option-elm", function(){
    let id = $(this).attr("data-id")
    AjaxCall("/admin/inventory/attributes/get-attr", {id}, function(res){
        if (!res.error) {
            $(".list").empty()
            res.data.forEach(item => {
                let html = `<li class="attributes-item"><a href="#">${item.name}</a></li>`
                $(".list").append(html)
            })
        }
    })
})
$("body").on("click", ".attributes-item", function(){
    // AJax petqa
    let text = $(this).children().text()

    $(".choset-attributes").append(`<li>${text} <span class="restore-item"><i class="fa fa-trash"></i></span> </li>`)
    $(this).remove()
})

$("body").on("click", ".restore-item", function(){
    let text = $(this).parent().text()
    $(this).parent().remove()
    let html = `<li class="attributes-item"><a href="#">${text}</a></li>`
                $(".list").append(html)
})

</script>
@stop