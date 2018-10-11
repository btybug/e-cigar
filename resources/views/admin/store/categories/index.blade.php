@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <!-- <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Categories</h2></div>
            <div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_store_categories_new') !!}">Add new</a></div>
        </div>
        <div class="col-xs-12">
            <table id="categories-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Icon</th>
                    <th>Added/Last Modified Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-4">
        <div id="tree1"></div>
        </div>
        <div class="col-md-8">
            <div class="button-area">
            <a class="btn btn-primary pull-right" href="{!! route('admin_store_categories_new') !!}">Add new</a></div>
            
            <div class="content-area">
            
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="https://mbraak.github.io/jqTree/tree.jquery.js"></script>
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

var data = [
  {
    name: "node1",
    id: 1,
    children: [{ name: "child1", id: 2 }, { name: "child2", id: 3 }]
  },
  {
    name: "node2",
    id: 4,
    children: [{ name: "child3", id: 5 }]
  }
];
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
    var tree_json = $("#tree1").tree("toJson");
    AjaxCall("/url", tree_json, function(res) {
      console.log(res);
    });
  }
});

$("#tree1").bind("tree.click", function(e) {
  var node = e.node;
  AjaxCall("/url", node.id, function(res) {
    console.log(res);
  });
});

        $(function () {
            $('#categories-table').DataTable({
                ajax:  "{!! route('dt_all_categories') !!}",
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
@stop