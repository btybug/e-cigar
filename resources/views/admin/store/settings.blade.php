@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" aria-expanded="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mail-tab" data-toggle="tab" href="#mail" role="tab" aria-controls="mail" aria-selected="false">Mail Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Shipping</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="socialApps-tab" data-toggle="tab" href="#socialApps" role="tab" aria-controls="socialApps" aria-selected="false">Social APPs</a>
            </li>
        </ul>
        <div class="tab-content tab-content-store-settings" id="myTabContent">
            <div class="tab-pane fade active in" id="general" role="tabpanel" aria-labelledby="general-tab">
                <form>
                    <div class="form-group">
                        <label for="SiteName">Site Name</label>
                        <input type="text" class="form-control" id="SiteName" aria-describedby="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="siteLogo">Site Logo</label>
                        <input type="file" class="form-control" id="siteLogo">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail Address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter E-Mail Address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="firstAddress">1st line address</label>
                        <input type="text" class="form-control" id="firstAddress" aria-describedby="firstAddress" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="secondAddress">2nd line address</label>
                        <input type="text" class="form-control" id="secondAddress" aria-describedby="secondAddress" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select id="city" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postCode">Post Code</label>
                        <input type="text" class="form-control" id="postCode" aria-describedby="postCode" placeholder="Enter Post Code">
                    </div>
                    <div class="form-group">
                        <label for="metaTitle">Meta Title</label>
                        <input type="text" class="form-control" id="metaTitle" aria-describedby="metaTitle" placeholder="Your Store">
                    </div>
                    <div class="form-group">
                        <label for="metaTagDesc">Meta Tag Description</label>
                        <input type="text" class="form-control" id="metaTagDesc" aria-describedby="metaTagDesc" placeholder="My Store">
                    </div>
                    <div class="form-group">
                        <label for="metaTagKeywords">Meta Tag Keywords</label>
                        <input type="text" class="form-control" id="metaTagKeywords" aria-describedby="metaTagKeywords" placeholder="Meta Tag Keywords">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="tab-pane fade" id="mail" role="tabpanel" aria-labelledby="mail-tab">
                <form>
                    <div class="form-group">
                        <label for="MailEngine">Mail Engine</label>
                        <input type="email" class="form-control" id="MailEngine" aria-describedby="MailEngine" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="MailParameters">Mail Parameters</label>
                        <input type="text" class="form-control" id="MailParameters" aria-describedby="MailParameters" placeholder="Mail Parameters">
                    </div>
                    <div class="form-group">
                        <label for="SMTPHostname">SMTP Hostname</label>
                        <input type="text" class="form-control" id="SMTPHostname" aria-describedby="SMTPHostname" placeholder="SMTP Hostname">
                    </div>
                    <div class="form-group">
                        <label for="SMTPUsername">SMTP Username</label>
                        <input type="text" class="form-control" id="SMTPUsername" aria-describedby="SMTPUsername" placeholder="SMTP Username">
                    </div>
                    <div class="form-group">
                        <label for="SMTPPassword">SMTP Password</label>
                        <input type="password" class="form-control" id="SMTPPassword" aria-describedby="SMTPPassword" placeholder="SMTP Password">
                    </div>
                    <div class="form-group">
                        <label for="SMTPPort">SMTP Port</label>
                        <input type="password" class="SMTPPort form-control" id="SMTPPort" aria-describedby="SMTPPort" placeholder="SMTP Port">
                    </div>
                    <div class="form-group">
                        <label for="SMTPTimeout">SMTP Timeout</label>
                        <input type="password" class="form-control" id="SMTPTimeout" aria-describedby="SMTPTimeout" placeholder="SMTP Timeout">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                <table id="discount" class="table table-responsive table--store-settings">
                    <tbody class="all-options">
                    <tr>
                        <td>
                            <label for="ShippingZones">Shipping to</label>
                        </td>
                        <td>
                            <select id="ShippingZones" class="form-control">
                                <option selected>Shipping Zones</option>
                                @foreach($shipping_zones as $zone)
                                    <option value="{!! $zone->tax !!}">{!! $zone->name !!}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-primary add-new-option"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-responsive table--store-settings">
                <tr class="bg-my-light-blue">
                        <td>Shipping Zone - <span id="shipzone">Armenia</span></td>
                        <td colspan="5">Tax Rate - <span id="taxzone">ArmeniaVaT20</span></td>
                    </tr>
                    <tbody>
                    
                    <tr class="bg-my-light-pink">
                        <th>Order Amount</th>
                        <th>Courier</th>
                        <th>Cost</th>
                        <th colspan="3">Time</th>
                    </tr>
                    <tr>
                        <td class="table--store-settings_vert-top">
                            <input type="number" min="1" max="5" class="form-control" style="display: inline-block; width: auto">
                            <span>To</span>
                            <input type="number" min="1" max="50" class="form-control" style="display: inline-block; width: auto">
                        </td>
                        <td>
                            <select id="PosType" class="form-control">
                                <option selected>Normal Post</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                3 days
                            </span>
                        </td>
                        <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <select id="dhl" class="form-control">
                                <option selected>DHL</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                1 day
                            </span>
                        </td>
                        <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                    <tr class="add-new-ship-filed-container">
                        <td colspan="6" class="text-right">
                            <button type="button" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    </tbody>

                    <tfoot>
                    
                 
                    <tr>
                        <td colspan="5" class="text-center table--store-settings_add-options add-new-order-filed">
                            <span><i class="fa fa-plus"></i></span> Add more option
                        </td>
                    </tr>


                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop

@section('js')
<script>
$("body").on("click", ".add-new-option", function () {
    const id = Date.now()
   let html = `<tr class="container-for-table-remove">
   <td>
      <label for="ShippingZones">Shipping to</label>
   </td>
   <td>
      <select id="ShippingZones" class="form-control">
         <option selected="">Shipping Zones</option>
         <option>...</option>
      </select>
   </td>
   <td class="text-right">
      <button type="button" data-table-id=${id} class="btn btn-primary delete-all-option"><i class="fa fa-trash"></i></button>
   </td>
</tr>`
let html2 = `
<table class="table table-responsive table--store-settings container-for-table-remove">
                <tr class="bg-my-light-blue">
                <td>Shipping Zone - <span>Armenia</span></td>
                <td colspan="3">Tax Rate - <span>ArmeniaVaT20</span></td>
                <td colspan="2" class="text-right"><button type="button" data-table-id="${id}" class="btn btn-primary delete-all-option"><i class="fa fa-trash"></i></button></span></td>
                    </tr>
                    <tbody>
                    
                    <tr class="bg-my-light-pink">
                        <th>Order Amount</th>
                        <th>Courier</th>
                        <th>Cost</th>
                        <th colspan="3">Time</th>
                    </tr>
                    <tr>
                        <td class="table--store-settings_vert-top">
                            <input type="number" min="1" max="5" class="form-control" style="display: inline-block; width: auto">
                            <span>To</span>
                            <input type="number" min="1" max="50" class="form-control" style="display: inline-block; width: auto">
                        </td>
                        <td>
                            <select id="PosType" class="form-control">
                                <option selected>Normal Post</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                3 days
                            </span>
                        </td>
                        <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <select id="dhl" class="form-control">
                                <option selected>DHL</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                1 day
                            </span>
                        </td>
                        <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                        </td>
                    </tr>
                    <tr class="add-new-ship-filed-container">
                        <td colspan="6" class="text-right">
                            <button type="button" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-center table--store-settings_add-options add-new-order-filed">
                            <span><i class="fa fa-plus"></i></span> Add more option
                        </td>
                    </tr>
                    </tfoot>
                </table>`
$(".all-options").append(html)
$("#shipping").append(html2)
})

$("body").on("click", ".remove-ship-filed", function(){
    $(this).closest("tr").remove()
})
$("body").on("click", ".add-new-ship-filed", function(){

let html = `<tr>
   <td></td>
   <td>
      <select id="dhl" class="form-control">
         <option selected="">DHL</option>
         <option>...</option>
      </select>
   </td>
   <td>
      <span class="form-control">
      5
      </span>
   </td>
   <td>
      <span class="form-control">
      1 day
      </span>
   </td>
   <td colspan="2" class="text-right">
      <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
   </td>
</tr>`
$(this).closest("tbody").find(".add-new-ship-filed-container").before(html)
})

$("body").on("click", ".delete-all-option", function (e) {
    console.log()
    let id =  $(this).attr("data-table-id")
    $("body").find(`[data-table-id="${id}"]`).closest(".container-for-table-remove").remove()
})
$("body").on("click", ".add-new-order-filed", function (e) {
    // console.log(e)
  let html = `  <tbody>
   
   <tr class="bg-my-light-pink">
      <th>Order Amount</th>
      <th>Courier</th>
      <th>Cost</th>
      <th colspan="3">Time</th>
   </tr>
   <tr>
      <td class="table--store-settings_vert-top">
         <input type="number" min="1" max="5" class="form-control" style="display: inline-block; width: auto">
         <span>To</span>
         <input type="number" min="1" max="50" class="form-control" style="display: inline-block; width: auto">
      </td>
      <td>
         <select id="PosType" class="form-control">
            <option selected="">Normal Post</option>
            <option>...</option>
         </select>
      </td>
      <td>
         <span class="form-control">
         5
         </span>
      </td>
      <td>
         <span class="form-control">
         3 days
         </span>
      </td>
      <td colspan="2" class="text-right">
         <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
      </td>
   </tr>
   <tr>
      <td></td>
      <td>
         <select id="dhl" class="form-control">
            <option selected="">DHL</option>
            <option>...</option>
         </select>
      </td>
      <td>
         <span class="form-control">
         5
         </span>
      </td>
      <td>
         <span class="form-control">
         1 day
         </span>
      </td>
      <td colspan="2" class="text-right">
         <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
      </td>
   </tr>
   <tr class="add-new-ship-filed-container">
      <td colspan="6" class="text-right">
         <button type="button" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
      </td>
   </tr>
</tbody>`
$(this).closest("table").append(html)
})

$('body').on('change','#ShippingZones',function (e) {
    e.preventDefault();
    let val = $(this).val();
    let text = $(`#ShippingZones option[value=${val}]`).text();
    $('#shipzone').text(text);
    $('#taxzone').text(val);

});
</script>
@stop


