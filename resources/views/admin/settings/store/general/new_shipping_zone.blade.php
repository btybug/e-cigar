@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div id="content" class="geo-zone-page">
        <div class="alert alert-danger error-place" style="display: none"></div>
        {!! Form::model($geo_zone,['url'=> route('admin_settings_geo_zone_save',($geo_zone)?$geo_zone->id:null),'class' => '','files' => true, 'id' => 'geo-zones-form' ]) !!}
        <div class="card panel panel-default">
                <div class="card-header panel-heading d-flex flex-wrap justify-content-between">
                    <h2 class="pull-left m-0">Geo Zones</h2>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary geo-zones-submit" data-original-title="Save"><i
                                    class="fa fa-save"></i>
                        </button>
                        <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i
                                    class="fa fa-reply"></i></a>
                    </div>
                </div>
            <div class="row">
                <div class="col-xl-9 col-lg-11">
                    <div class="card-body panel-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-geo-zone" data-toggle="tab" href="#geo-zone" role="tab"
                                   aria-controls="geo-zone" aria-selected="true" aria-expanded="true"> Add Geo Zone</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-delivery-cost" data-toggle="tab" href="#delivery-cost" role="tab"
                                   aria-controls="delivery-cost" aria-selected="false">Delivery Cost</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in show" id="geo-zone" role="tabpanel" aria-labelledby="delivery-cost">
                                <div class="card-body panel-body panel-body--new-shipping-zone">
                                    <div class="form-group required">
                                        <div class="row">
                                            <label class="col-sm-3" for="input-name">Geo Zone Name</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('name',null,['placeholder'=>'Geo Zone Name','id' => 'input-name','class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group required">
                                        <div class="row">
                                            <label class="col-sm-3" for="input-description">Description</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('description',null,['placeholder'=>'Description','id' => 'input-description','class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3" for="input-description">Payment Options</label>
                                            <div class="col-sm-9 payment-container">
                                                @if($geo_zone && $geo_zone->payment_options && count($geo_zone->payment_options))
                                                    @foreach($geo_zone->payment_options as $payment_option)
                                                        <div class="payment-option-container mb-10 d-flex">
                                                            {!! Form::select('payment_options[]',["paypal"=>"paypal", "stripe"=>"stripe", "cash"=>"cash"],
                                                            $payment_option,['class' => 'form-control','id'=>'payment_options']) !!}
                                                            @if($loop->last)
                                                                <button type="button" class="btn btn-primary add-new-payment-option ml-5"><i class="fa fa-plus"></i></button>
                                                            @else
                                                                <button type="button" class="btn btn-danger remove-new-payment-option ml-5"><i class="fa fa-trash"></i></button>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="payment-option-container mb-2 d-flex">
                                                        {!! Form::select('payment_options[]',["paypal"=>"paypal", "stripe"=>"stripe", "cash"=>"cash"],null,['class' => 'form-control','id'=>'payment_options']) !!}
                                                        <button type="button" class="btn btn-primary add-new-payment-option ml-5"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <div class="row">
                                            <label class="col-sm-3" for="input-tax-id">Tax Rate</label>
                                            <div class="col-sm-9">
                                                {!! Form::select('tax_rate_id',[null=>'No Tax']+$tax_rates,null,['id' => 'input-tax-id','class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <fieldset>
                                            <legend>Geo Zones</legend>
                                        </fieldset>
                                        <div class="table-responsive">
                                            <table id="zone-to-geo-zone" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr class="bg-info">
                                                    <td>Country</td>
                                                    <td colspan="2">Regions</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>

                                                @if(isset($geo_zone) && $geo_zone && isset($geo_zone->countries) && count($geo_zone->countries))
                                                    @foreach($geo_zone->countries as $key=>$country)
                                                        <tr>
                                                            <td>
                                                                {!! Form::select('country['.$key.']',$countries,$country->name,[ 'class'=>'country form-control', 'data-count' => "0"]) !!}
                                                            </td>
                                                            <td>
                                                                <div class="region-container">
                                                                    <select multiple name='region[{!! $key !!}][]'
                                                                            class="form-control region select-{!! $key !!}" style="min-width: 100px">
                                                                        @php
                                                                            $old=$country->regions->pluck('name','name')->toArray();
                                                                        $getRegions=getRegions($country->name);
                                                                        @endphp
                                                                        @foreach($getRegions as $region)

                                                                            <option value="{!! $region !!}"
                                                                                    @if(isset($old[$region])) selected @endif>{!! $region !!}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="checkbox"
                                                                           @if(count($getRegions)==$country->regions->count()) checked
                                                                           @endif class="select-all"
                                                                           data-select="select-{!! $key !!}">Select All
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div>
                                                                    @if(count($geo_zone->countries)!=$key+1)
                                                                        <button type="button" data-count="{!! $key !!}"
                                                                                class="btm btn-danger remove-new-get-zones"><i
                                                                                class="fa fa-trash"></i></button>


                                                                    @else
                                                                        <button type="button" data-count="{!! $key !!}"
                                                                                class="btn btn-primary add-new-get-zones"><i
                                                                                class="fa fa-plus"></i></button>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td>
                                                            {!! Form::select('country[0]',$countries,null,[ 'class'=>'country form-control', 'data-count' => "0"]) !!}
                                                        </td>
                                                        <td>
                                                            <div class="region-container">
                                                                {!! Form::select('regions[0][]',[],'all_selected',['class'=>'form-control region','multiple']) !!}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <button type="button" data-count="0" class="btn btn-primary add-new-get-zones"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="delivery-cost" role="tabpanel" aria-labelledby="delivery-cost">
                                @if($geo_zone)

                                    @foreach($geo_zone->deliveries as $key=>$delivery)
                                        <table class="table table-responsive table--store-settings" data-table-id="20">
                                            @if(!$key)
                                                <tr class="bg-my-light-blue">

                                                    <td colspan="6">
                                                        <div class="form-group mb-0 required">
                                                            <div class="row">
                                                                <div class="col-xl-7">
                                                                    <div class="row">
                                                                        <label class="col-xl-2 col-3" for="input-name"> Delivery cost</label>
                                                                        <div class="col-xl-10 col-9">
                                                                            {!! Form::select('delivery_cost_types_id',$delivery_types,$delivery->delivery_cost_types_id,['id' => 'input-name','class' => 'form-control']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-5">
                                                                    <a href="javascript:void(0)" data-order-count="0"
                                                                            class="btn btn-primary text-center table--store-settings_add-options add-new-order-filed pull-right">
                                                                        <span><i class="fa fa-plus"></i></span> Add more option
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                            <tbody>

                                            <tr class="bg-my-light-pink">
                                                <th>{!! ($delivery->delivery_cost_types_id==1)?'Order Amount':'Weight Amount' !!}</th>
                                                <th>Courier</th>
                                                <th>Cost</th>
                                                <th colspan="2">Time</th>
                                                <th><button type="button" class="btn btn-danger remove-deliver-option"><i class="fa fa-trash"></i></button></th>
                                            </tr>
                                            @foreach($delivery->options as $key=>$option)
                                                <tr>

                                                    <td class="table--store-settings_vert-top">
                                                        @if(!$key)
                                                            {!! Form::number('delivery_cost['.$delivery->id.'][min]',$delivery->min,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                                                            <span>To</span>
                                                            {!! Form::number('delivery_cost['.$delivery->id.'][max]',$delivery->max,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {!! Form::select('delivery_cost['.$delivery->id.'][options]['.$option->id.'][courier_id]',$active_couriers,$option->courier_id,['class'=>'form-control']) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::number('delivery_cost['.$delivery->id.'][options]['.$option->id.'][cost]',$option->cost,['class'=>'form-control','min'=>'0', 'max'=>"99999.99",'step'=>'0.01']) !!}

                                                    </td>
                                                    <td>
                                                        {!! Form::text('delivery_cost['.$delivery->id.'][options]['.$option->id.'][time_text]',$option->time,['class'=>'form-control','placeholder'=>'3 day']) !!}

                                                    </td>
                                                    <td colspan="2" class="text-right">
                                                        <button type="button" class="btn btn-danger remove-ship-filed"><i
                                                                    class="fa fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {!! Form::textarea('delivery_cost['.$delivery->id.'][options]['.$option->id.'][order_amount_text]',$option->order_amount_text,['class'=>'form-control tinyMcArea','placeholder'=>'FREE on orders over £10']) !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class="add-new-ship-filed-container">
                                                <td colspan="6" class="text-right">
                                                    <button type="button" data-id="{!! $delivery->id !!}"
                                                            data-options-count="{!! $option->id !!}"
                                                            data-exists="true"
                                                            class="btn btn-primary add-new-ship-filed"><i
                                                                class="fa fa-plus-circle"></i></button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                @else
                                    <table class="table table-responsive table--store-settings" data-table-id="20">
                                        <tr>

                                            <td colspan="6">
                                                <div class="form-group mb-0 required">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label class="col-sm-2 control-label" for="input-name"> Delivery
                                                                cost</label>
                                                            <div class="col-sm-10">
                                                                {!! Form::select('delivery_cost_types_id',$delivery_types,null,['id' => 'input-name','class' => 'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tbody>

                                        <tr class="bg-info">
                                            <th>Order Amount</th>
                                            <th>Courier</th>
                                            <th>Cost</th>
                                            <th colspan="2">Time</th>
                                            <th><button type="button" class="btn btn-danger remove-deliver-option"><i class="fa fa-trash"></i></button></th>

                                        </tr>
                                        <tr>
                                            <td class="table--store-settings_vert-top">

                                                {!! Form::number('delivery_cost[0][min]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                                                <span>To</span>
                                                {!! Form::number('delivery_cost[0][max]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}

                                            </td>
                                            <td>
                                                {!! Form::select('delivery_cost[0][options][0][courier_id]',$active_couriers,null,['class'=>'form-control']) !!}
                                            </td>
                                            <td>
                                                {!! Form::number('delivery_cost[0][options][0][cost]',null,['class'=>'form-control','min'=>'0', 'max'=>"99999.99",'step'=>'0.01']) !!}

                                            </td>
                                            <td>
                                                {!! Form::text('delivery_cost[0][options][0][time]',null,['class'=>'form-control','placeholder'=>'3 day']) !!}

                                            </td>
                                            <td colspan="2" class="text-right">
                                                <button type="button" class="btn btn-danger remove-ship-filed"><i
                                                            class="fa fa-minus-circle"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {!! Form::textarea('delivery_cost[0][options][0][order_amount_text]',null,['class'=>'form-control tinyMcArea','placeholder'=>'FREE on orders over £10']) !!}
                                            </td>
                                        </tr>
                                        <tr class="add-new-ship-filed-container">
                                            <td colspan="6" class="text-right">
                                                <button type="button" data-id="0" data-options-count="0"
                                                        data-exists="false"
                                                        class="btn btn-primary add-new-ship-filed"><i
                                                            class="fa fa-plus-circle"></i></button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {!!   Form::close()   !!}
    </div>
@stop
@section("css")
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script src="{{asset('admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js')}}"></script>
    <script src="{{asset('js/custom/get_zones.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="/plugins/tinymce/tinymce.js"></script>

    <script>
        function initTinyMce(e) {
            tinymce.init({
                selector: e,
                plugins: 'print preview fullpage   importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists  wordcount   imagetools textpattern noneditable help    charmap   quickbars  emoticons ',
                //   imagetools_cors_hosts: ['picsum.photos'],
                //   tinydrive_token_provider: function (success, failure) {
                //     success({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo' });
                //   },
                //   tinydrive_demo_files_url: '/docs/demo/tiny-drive-demo/demo_files.json',
                //   tinydrive_dropbox_app_key: 'jee1s9eykoh752j',
                //   tinydrive_google_drive_key: 'AIzaSyAsVRuCBc-BLQ1xNKtnLHB3AeoK-xmOrTc',
                //   tinydrive_google_drive_client_id: '748627179519-p9vv3va1mppc66fikai92b3ru73mpukf.apps.googleusercontent.com',
                // mobile: {
                //     plugins: 'print preview fullpage   importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists  wordcount   textpattern noneditable help   charmap  quickbars  emoticons '
                // },
                menu: {
                    tc: {
                        title: 'TinyComments',
                        items: 'addcomment showcomments deleteallconversations'
                    }
                },
                menubar: '',
                //   'file edit view insert format tools table tc help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist  | forecolor backcolor    removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
                autosave_ask_before_unload: true,
                //   autosave_interval: "30s",
                //   autosave_prefix: "{path}{query}-{id}-",
                //   autosave_restore_when_empty: false,
                //   autosave_retention: "2m",
                image_advtab: true,
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tiny.cloud/css/codepen.min.css'
                ],
                link_list: [
                    { title: 'My page 1', value: 'http://www.tinymce.com' },
                    { title: 'My page 2', value: 'http://www.moxiecode.com' },
                    { title: 'Kaliony', value: 'http://e-cigar.com' }
                ],
                image_list: [
                    { title: 'My page 1', value: 'http://www.tinymce.com' },
                    { title: 'My page 2', value: 'http://www.moxiecode.com' }
                ],
                image_class_list: [
                    { title: 'None', value: '' },
                    { title: 'Some class', value: 'class-name' }
                ],
                importcss_append: true,
                height: 200,
                //   file_picker_callback: function (callback, value, meta) {
                //     /* Provide file and text for the link dialog */
                //     if (meta.filetype === 'file') {
                //       callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                //     }

                //     /* Provide image and alt text for the image dialog */
                //     if (meta.filetype === 'image') {
                //       callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                //     }

                //     /* Provide alternative source and posted for the media dialog */
                //     if (meta.filetype === 'media') {
                //       callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                //     }
                //   },
                templates: [
                    { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
                ],
                template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                height: 200,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                noneditable_noneditable_class: "mceNonEditable",
                toolbar_drawer: 'sliding',
                spellchecker_dialog: true,
                spellchecker_whitelist: ['Ephox', 'Moxiecode'],
                tinycomments_mode: 'embedded',
                content_style: ".mymention{ color: gray; }",
                contextmenu: "link image imagetools table configurepermanentpen",
                mentions_selector: '.mymention',
                //   mentions_fetch: mentions_fetch,
                //   mentions_menu_hover: mentions_menu_hover,
                //   mentions_menu_complete: mentions_menu_complete,
                //   mentions_select: mentions_select,
            });
        }

        initTinyMce(".tinyMcArea")

        $("body").on("click", ".remove-deliver-option", function () {
            $(this).closest("tbody").remove()
        })
        var count = {!! isset($delivery)?($delivery->id + 1) : 1 !!}
    $("body").on("click", ".add-new-order-filed", function (e) {
            // console.log(e)
            let html = `  <tbody>

<tr class="bg-my-light-pink">
<th>Order Amount</th>
<th>Courier</th>
<th>Cost</th>
<th colspan="2">Time</th>
<th><button type="button" class="btn btn-danger remove-deliver-option"><i class="fa fa-trash"></i></button></th>

</tr>
<tr>
<td class="table--store-settings_vert-top">
{!! Form::number('delivery_cost[${count}][min]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                <span>To</span>
                {!! Form::number('delivery_cost[${count}][max]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}

                </td>
                 <td>
                                        {!! Form::select('delivery_cost[${count}][options][0][courier_id]',$active_couriers,null,['class'=>'form-control']) !!}
                </td>
                <td>
                    {!! Form::number('delivery_cost[${count}][options][0][cost]',null,['class'=>'form-control','min'=>'0', 'max'=>"99999.99",'step'=>'0.01']) !!}

                </td>
                <td>
                    {!! Form::text('delivery_cost[${count}][options][0][time]',null,['class'=>'form-control','placeholder'=>'3 day']) !!}

                </td>

          <td colspan="2" class="text-right">
          <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
          </td>

          </tr>
          <tr class="add-new-ship-filed-container">
          <td colspan="6" class="text-right">
          <button type="button" data-options-count="1"  data-id="${count}" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
</td>
</tr>
<tr>
    <td>
        {!! Form::textarea('delivery_cost[${count}][options][0][order_amount_text]',null,['class'=>'form-control tinyMcArea','placeholder'=>'FREE on orders over £10']) !!}
    </td>
</tr>
</tbody>`;
            count++
            $(this)
                .closest("table")
                .append(html);
            initTinyMce(".tinyMcArea")
        });

        let datax = "";
        $("body").on("click", ".add-new-option", function () {
            const id = Date.now();
            let html = `<tr class="container-for-table-remove" data-table-id="${id}">
<td>
<label for="ShippingZones">Shipping to</label>
</td>
<td>
<select id="ShippingZones" class="form-control">
<option selected="">Shipping Zones</option>
${datax}
</select>
</td>
<td class="text-right">
<button type="button"  data-table-id=${id} class="btn btn-primary delete-all-option"><i class="fa fa-trash"></i></button>
</td>
</tr>`;
            let html2 = `
<table class="table table-responsive table--store-settings container-for-table-remove" data-table-id="${id}">
      <tr class="bg-my-light-blue">
      <td>Shipping Zone - <span class="shipzone">Armenia</span></td>
      <td colspan="3">Tax Rate - <span class="taxzone">ArmeniaVaT20</span></td>
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
                  {!! Form::number('delivery_cost[0][min]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
                <span>To</span>
                {!! Form::number('delivery_cost[0][max]',null,['class'=>'form-control','min'=>'1', 'style'=>"display: inline-block; width: auto"]) !!}
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
          <button type="button" data-id="${count}" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
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
</table>`;
            count++
            $(".all-options").append(html);
            $("#myTabContent").append(html2);
        });
        $("body").on("click", ".add-new-ship-filed", function () {
            let data_id = $(this).attr("data-id");
            let data_options_count = parseInt($(this).attr("data-options-count")) + 1;
            $(this).attr("data-options-count", data_options_count);
            let delveriCost = "delivery_cost"
            let html = `<tr>
<td></td>
<td>
{!! Form::select('${delveriCost}[${data_id}][options][${data_options_count}][courier_id]',$active_couriers,null,['class'=>'form-control']) !!}
                </td>
                <td>
              {!! Form::number('${delveriCost}[${data_id}][options][${data_options_count}][cost]',null,['class'=>'form-control','min'=>'0', 'max'=>"99999.99",'step'=>'0.01']) !!}


                </td>
                <td>
                  {!! Form::text('${delveriCost}[${data_id}][options][${data_options_count}][time]',null,['class'=>'form-control','placeholder'=>'3 day']) !!}

                </td>
                <td colspan="2" class="text-right">
                   <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                </td>
             </tr>`;
            $(this)
                .closest("tbody")
                .find(".add-new-ship-filed-container")
                .before(html);
        });
        $(".region").each(function () {
            $(this).select2()
        })

        $(".geo-zones-submit").on("click", function (e) {
            e.preventDefault();
            let data = $("#geo-zones-form").serialize()
            postSendAjax($("#geo-zones-form").attr("action"), data, function (res) {

                if (!res.error) {
                    location.replace(res.url)
                }
            }, function (err) {

                if (err.responseJSON.message) {
                    $(".error-place").empty()
                    Object.entries(err.responseJSON.errors).forEach(([key, val]) => {
                        $(".error-place"
                ).
                    append(`<p> ${val[0]}</p>`)
                })
                    ;
                    $(".error-place").show()
                }
            })
        })
        $("body").on('click', '.select-all', function () {
            var selector = '.' + $(this).attr("data-select");
            if ($(this).is(':checked')) {
                $(selector + " > option").prop("selected", "selected");
                console.log($(selector).trigger("change"));
            } else {
                console.log(1);
                $(selector + " > option").prop("selected", false);
                console.log($(selector).trigger("change"));
            }
        });
    </script>
@stop
