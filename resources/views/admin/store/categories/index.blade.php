@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-md-4">
        <div id="tree1"></div>
        </div>
        <div class="col-md-8">
            <div class="button-area">
            <a class="btn btn-primary pull-right" href="javascript:void(0)">Add new</a></div>
            
            <div class="content-area">

                @include('admin.store.categories.create_or_update')
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="https://mbraak.github.io/jqTree/tree.jquery.js"></script>
<script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script>
    $('.icon-picker').iconpicker();
    $("body").on("click", ".iconpicker-item", function(){
        let value = $(".icon-picker").val()
        $("#font-show-area").attr("class", value)
    })
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

var data = {!! json_encode(\App\Models\Category::recursiveItems($categories),true) !!};

$("#tree1").tree({
  data: data,
  //   dataUrl: {
  //     url: '/example_data.json',
  //     headers: {'abc': 'def'}
  // },
  autoOpen: true,
  saveState: true,
  dragAndDrop: true,
  onDragStop: function(e, node) {
    let id = e.id
    let parentId = e.parent.id
    // var tree_json = $("#tree1").tree("toJson");
    AjaxCall("/url", {id, parentId}, function(res) {
      console.log(res);
    });
  }
});

$("#tree1").bind("tree.click", function(e) {
  AjaxCall("/url", {id: e.node.id}, function(res) {
    console.log(res);
  });
});

        $(function () {
            $('#categories-table').DataTable({
                ajax:  "{!! route('datatable_all_categories') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description',name: 'description'},
                    {data: 'image', name: 'image'},
                    {data: 'icon', name: 'icon'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        });

    </script>
@stop
@section("css")
<link rel="stylesheet" href="https://mbraak.github.io/jqTree/jqtree.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
<link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
<style>
#font-show-area {
    font-size: 50px;
    margin-top: 15px;
}
</style>
@stop