@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="coupons_new_page">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="dis-flex">
                        <div class="col-sm-7 pl-0">
                            <div class="row required">
                                <label class="col-sm-2 control-label" for="input-name">Coupon Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="" placeholder="Coupon Name"
                                           id="input-name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 p-0">
                            <div class="button-save  text-right">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="panel-body">
                    <form action="" method="post" enctype="" id="form-coupon" class="form-horizontal">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-general">

                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-code"><span data-toggle="tooltip"
                                                                                                 title=""
                                                                                                 data-original-title="The code the customer enters to get the discount.">Code</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="code" value="" placeholder="Code" id="input-code"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-type"><span data-toggle="tooltip"
                                                                                                 title=""
                                                                                                 data-original-title="Percentage or Fixed Amount.">Type</span></label>
                                    <div class="col-sm-10">
                                        <select name="type" id="input-type" class="form-control">
                                            <option value="P">Percentage</option>
                                            <option value="F">Fixed Amount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-discount">Discount</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="discount" value="" placeholder="Discount"
                                               id="input-discount" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                                  title=""
                                                                                                  data-original-title="The total amount that must be reached before the coupon is valid.">Total Amount</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="total" value="" placeholder="Total Amount"
                                               id="input-total" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Free Shipping</label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline"> <input type="radio" name="shipping" value="1">
                                            Yes
                                        </label>
                                        <label class="radio-inline"> <input type="radio" name="shipping" value="0"
                                                                            checked="checked">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-product"><span
                                                data-toggle="tooltip" title=""
                                                data-original-title="Choose specific products the coupon will apply to. Select no products to apply coupon to entire cart.">Products</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="product" value="" placeholder="Products"
                                               id="input-product" class="form-control" autocomplete="off">
                                        <ul class="dropdown-menu"></ul>
                                        <div id="coupon-product" class="well well-sm view-coupon"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-date-start">Date Start</label>
                                    <div class="col-sm-3">
                                        <div class="input-group date">
                                            <input type="text" name="date_start" 
                                                   placeholder="Date Start" data-date-format="YYYY-MM-DD"
                                                   id="input-date-start" class="form-control">
                                            <span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-date-end">Date End</label>
                                    <div class="col-sm-3">
                                        <div class="input-group date">
                                            <input type="text" name="date_end"  placeholder="Date End"
                                                   data-date-format="YYYY-MM-DD" id="input-date-end"
                                                   class="form-control">
                                            <span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-uses-total"><span
                                                data-toggle="tooltip" title=""
                                                data-original-title="The maximum number of times the coupon can be used by any customer. Leave blank for unlimited">Uses Per Coupon</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uses_total" value="1" placeholder="Uses Per Coupon"
                                               id="input-uses-total" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-uses-customer"><span
                                                data-toggle="tooltip" title=""
                                                data-original-title="The maximum number of times the coupon can be used by a single customer. Leave blank for unlimited">Uses Per Customer</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uses_customer" value="1"
                                               placeholder="Uses Per Customer" id="input-uses-customer"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-status">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="input-status" class="form-control">
                                            <option value="1" selected="selected">Enabled</option>
                                            <option value="0">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
@stop
@section('js')
<script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
<script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/bootstrap-tagsinput.js"></script>
<script>
$('#input-date-start').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    // minYear: 1901,
    // maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
    var years = moment().diff(start, 'years');
    // alert("You are " + years + " years old!");
  });
$('#input-date-end').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    // minYear: 1901,
    // maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
    var years = moment().diff(start, 'years');
    // alert("You are " + years + " years old!");
  });

   
    var userList = null;
    $.ajax({
    url: "/admin/get-categories",
    type: "POST",
    dataType: "json",
    headers: {
      "X-CSRF-TOKEN": $("input[name='_token']").val()
    },
    success: function(data) {
      userList = data;
    }
  });
    $("#input-category").tagsinput({
    maxTags: 5,
    confirmKeys: [13, 32, 44],
    typeaheadjs: {
      // name: "citynames",
      displayKey: "name",
      valueKey: "name",
      source: function(query, processSync, processAsync) {
        return $.ajax({
          url: "/admin/get-categories",
          type: "POST",
          data: { query: query },
          dataType: "json",
          headers: {
            "X-CSRF-TOKEN": $("input[name='_token']").val()
          },
          success: function(json) {
            return processAsync(json);
          }
        });
      },
      templates: {
        empty: ['<div class="empty-message">', "No results", "</div>"].join(
          "\n"
        ),
        header: "<h4>Categoris</h4><hr>",
        suggestion: function(data) {
          return `<div class="user-search-result"><span> ${data.name} </span></div>`;
        }
      }
    }
  });
  $("#input-category").on("beforeItemAdd", function(event) {
    event.cancel = true;
    let valueCatergorayName = $("#category-names").val()
    if (!valueCatergorayName.includes(event.item)) {
        $(".coupon-category-list").append(makeSearchHtml(event.item))
        if ($("#category-names").val().trim()) {
            let arr = JSON.parse($("#category-names").val())
            arr.push(event.item)
            $("#category-names").val(JSON.stringify(arr))

            console.log(1)
            return
        }
        console.log(2)
            let elm = [event.item]
            $("#category-names").val(JSON.stringify(elm))
            return
        
    }
  });
  function makeSearchHtml(data){
      
      return `<li>${data}<span class="remove-search-tag"><i class="fa fa-trash"></i></span></li>`

  }
  $("body").on("click", ".remove-search-tag", function(){
      let text = $(this).closest("li").text()
      let arr = JSON.parse($("#category-names").val())
      let index = arr.indexOf(text)
      arr.splice(index,1)
      $("#category-names").val(JSON.stringify(arr))
      $(this).closest("li").remove()

  })
    
</script>
@stop
