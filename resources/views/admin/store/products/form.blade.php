{!! Form::model($model,['url' => route('admin_store_new_product'), 'id' => 'post_form','files' => true]) !!}
{!! Form::hidden('id',null) !!}
<div id="home" class="tab-pane tab_info fade in active">
    <div class="text-right btn-save pull-right">
        <button type="button" class="btn btn-success btn-view">View Product</button>
        {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row sortable-panels">
        <div class="col-md-9 ">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            @if(count(get_languages()))
                                <ul class="nav nav-tabs tab_lang_horizontal">
                                    @foreach(get_languages() as $language)
                                        <li class="@if($loop->first) active @endif"><a data-toggle="tab"
                                                                                       href="#{{ strtolower($language->code) }}">
                                                <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="tab-content">
                                @if(count(get_languages()))
                                    @foreach(get_languages() as $language)
                                        <div id="{{ strtolower($language->code) }}"
                                             class="tab-pane fade  @if($loop->first) in active @endif">
                                            <div class="form-group">
                                                <label>Name</label>
                                                {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                                <label>Short Description</label>
                                                {!! Form::textarea('translatable['.strtolower($language->code).'][short_description]',get_translated($model,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                            </div>
                                            <div class="form-group">
                                                <label>Long Description</label>
                                                {!! Form::textarea('translatable['.strtolower($language->code).'][long_description]',get_translated($model,strtolower($language->code),'long_description'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sku" class="control-label col-sm-4">SKU</label>
                            <div class="col-sm-8">
                                <div id="stock-sku">{{ (is_array($model)) ? @$model['sku'] : @$model->sku }}</div>
                                {!! Form::hidden('sku',null,['id' => 'sku']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sku" class="control-label col-sm-4">Taxable</label>
                            <div class="col-sm-8">
                                Taxable {!! Form::radio('taxable',1,null) !!}
                                Not taxable {!! Form::radio('taxable',0,true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group row">
                                <label class="col-sm-3">Featured image</label>
                                <div class="col-sm-9">
                                    {!! media_button('image',$model) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="view-product-wall">
                <div class="author-wall wall">
                    <div class="row">
                        {{Form::label('stock', 'Main Stock',['class' => 'col-sm-3'])}}
                        <div class="col-sm-9">
                            {!! Form::select('stock_id',['' => 'Select stock'] + $stocks,null,
                                        ['class' => 'form-control','id'=> 'stock']) !!}
                        </div>
                    </div>
                </div>
                <div class="author-wall wall">
                    <div class="row">
                        {{Form::label('author', 'Author',['class' => 'col-sm-3'])}}
                        <div class="col-sm-9">
                            {!! Form::select('user_id',$authors,null,
                                        ['class' => 'form-control','id'=> 'status']) !!}
                        </div>
                    </div>
                </div>
                <div class="status-wall wall">
                    <div class="row">
                        {{Form::label('status', 'Status',['class' => 'col-sm-3'])}}
                        <div class="col-sm-9">
                            {!! Form::select('status',['published' => 'Published','draft' => 'Draft','pending' => 'Pending'],null,
                                        ['class' => 'form-control','id'=> 'status']) !!}
                        </div>
                    </div>
                </div>
                <div class="status-wall wall">
                    <div class="row">
                        {{Form::label('type', 'Type',['class' => 'col-sm-3'])}}
                        <div class="col-sm-9">
                            {!! Form::select('type',['vape' => 'Vape','juice' => 'Juice'],null,
                                        ['class' => 'form-control','id'=> 'type']) !!}
                        </div>
                    </div>
                </div>
            <!-- <div class="tag-wall wall">
                            <div class="row">
                                {{Form::label('tags', 'Tags',['class' => 'col-sm-3'])}}
                    <div class="col-sm-9">
{{Form::text('tags', null,['class' =>'form-control','id'=>'tags','data-role'=>'tagsinput'])}}
                    </div>
                </div>
            </div> -->
                <div class="tag-wall wall">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="input-category"><span
                                    data-toggle="tooltip" title=""
                                    data-original-title="Choose all products under selected category.">Tags</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="" value="" placeholder="Tags"
                                   id="input-tags" class="form-control" autocomplete="off">
                            <ul class="dropdown-menu"></ul>
                            <div id="coupon-category" class="well well-sm view-coupon">
                                <ul class="coupon-tags-list">
                                </ul>
                            </div>
                            <input type="hidden" class="search-hidden-input" value="" id="tags-names">

                        </div>
                    </div>
                </div>
                <div class="category-wall wall">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="input-category"><span
                                    data-toggle="tooltip" title=""
                                    data-original-title="Choose all products under selected category.">Category</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="" value="" placeholder="Category"
                                   id="input-category" class="form-control" autocomplete="off">
                            <ul class="dropdown-menu"></ul>
                            <div id="coupon-category" class="well well-sm view-coupon">
                                <ul class="coupon-category-list">
                                </ul>
                            </div>
                            <input type="hidden" class="search-hidden-input" value="" id="category-names">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tabs_data" class="tab-pane price_tab_stre_page fade">
    <div class="text-right btn-save">
        <button type="submit" class="btn btn-info">Save</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default media_panel">
                <div class="panel-heading">
                    <div class="pull-left">
                        Media Tab
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body min-300 ">
                    <div class="basic-details-tab media-new-tab ">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list">
                                            <ul class="nav nav-tabs media-list">
                                                <li><a data-toggle="tab" href="#mediaotherimage">Other images</a></li>
                                                <li class="active"><a data-toggle="tab" href="#mediavideos">Videos</a>
                                                <li><a data-toggle="tab" href="#mediaposters">Posters</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="basic-center basic-wall">
                                        <div class="tab-content">
                                            <div id="mediaotherimage" class="tab-pane fade ">
                                                {!! media_button('other_images',(object)$model,true) !!}
                                            </div>
                                            <div id="mediavideos" class="tab-pane fade in active">
                                                <div class="media-videos">
                                                    <div class="input-group " style="display: flex">
                                                        <input type="text" class="form-control video-url-link"
                                                               placeholder="Video Url" aria-label="Video Url"
                                                               aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info add-video-url"
                                                                    type="button">Add Link
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="media-videos-preview" style="display: flex">
                                                        @php
                                                            $videoModel = (is_object($model))? $model :(object)$model;
                                                        @endphp
                                                        @if(isset($videoModel->videos) && $videoModel->videos && count($videoModel->videos))
                                                            @foreach($videoModel->videos as $video)
                                                                <div class="video-single-item" style="display: flex">
                                                                    <iframe width="200" height="200" src="https://www.youtube.com/embed/{{ $video }}">
                                                                    </iframe><div><button class="btn btn-danger remove-video-single-item">
                                                                            <i class="fa fa-trash"></i></button></div><input type="hidden" name="videos[]" value="{{ $video }}"> </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="mediaposters" class="tab-pane fade ">
                                                {!! media_button('posters',(object)$model,true) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="basic-details-tab attributes_tab">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list-attributes">
                                            <ul class="get-all-attributes-tab">
                                                @if(isset($attrs) && count($attrs))
                                                    @foreach($attrs as $attribute)
                                                        <li style="display: flex"
                                                            data-option-container="{!! $attribute->id !!}"
                                                            data-id="{!! $attribute->id !!}"
                                                            class="option-elm-attributes"><a
                                                                    href="#">{!! $attribute->name !!}</a>
                                                            <div class="buttons">
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-sm all-option-add-variations btn-success"><i
                                                                            class="fa fa-money"></i></a>
                                                                <a href="javascript:void(0)"
                                                                   class="remove-all-attributes btn btn-sm btn-danger"><i
                                                                            class="fa fa-trash"></i></a>
                                                            </div>
                                                            <input type="hidden" name="attributes[]"
                                                                   value="{!! $attribute->id !!}">
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="button-add text-center">
                                            <a href="javascript:void(0)"
                                               class="btn btn-info btn-block get-all-attributes-tab-event"><i
                                                        class="fa fa-plus"></i>Add new
                                                option</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="basic-center basic-wall">
                                        <ul class="choset-attributes">
                                            @if(isset($attrs) && count($attrs))
                                                @foreach($attrs as $attribute)
                                                    <div style="height: 50px" data-attr-id="{{$attribute->id}}"
                                                         class="attributes-container-{{$attribute->id}} main-attr-container">
                                                        <input data-id="{{$attribute->id}}"
                                                               class="attributes-item-input-{{$attribute->id}}"
                                                               value="{{ implode(',',$attribute->children->pluck('name')->all()) }}">
                                                        <input type="hidden" name="options[{{$attribute->id}}]"
                                                               value="{{ implode(',',$attribute->children->pluck('id')->all()) }}">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="stocks" class="tab-pane fade">
    <div class="text-right btn-save">
        <button type="submit" class="btn btn-info">Save</button>
    </div>
    <div class="row">
        <div class="col-md-3">
            {{--<label>Select Stocks</label>--}}
            {{--{!! Form::select('stocks[]',['' => 'select stocks'],null,['class' => 'form-control']) !!}--}}
            <div class="basic-left basic-wall">
                <div class="all-list-attributes" style="box-shadow: 0 0 4px #ccc;
    border: 1px solid #eee;
    background-color: #fff;
    color: black;
    min-height: 400px;
    padding: 20px;">
                <ul class="get-all-attributes-tab" style="padding-left:0">
                    @if(isset($variations) && count($variations))
                            <li style="display: flex; padding: 10px;background-color: #f7f7f7;border-bottom: 1px solid #ccc; box-shadow: 0 0 4px #a5a5a5; margin-bottom: 7px;color: #000;transition: 0.5s ease;justify-content: space-between;"
                                class="option-elm-attributes"><a href="#">Main Stock</a>
                                <div class="buttons">
                                    <button class="remove-all-attributes btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                </div>
                            </li>
                    @endif
                </ul>
                </div>
                <div class="button-add text-center">
                    <a href="javascript:void(0)" class="btn btn-info btn-block get-all-attributes-tab-event"><i
                                class="fa fa-plus"></i>Add new
                        option</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <table id="discount" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <td class="text-left">Customer Group</td>
                    <td class="text-right">Price</td>
                    <td class="text-left">Date Start</td>
                    <td class="text-left">Date End</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @if(isset($variations) && count($variations))
                    @foreach($variations as $variation)
                        {!! Form::hidden("variations[".$variation->variation_id."]",json_encode($variation->toArray()),['id' => 'variation_'.$variation->variation_id]) !!}
                        <tr id="discount-row0">
                    <td class="text-left">
                        @foreach($variation->options as $options)
                            {!! Form::hidden("variation_options[".$variation->variation_id."][".$options->attributes_id."][attributes_id]",$options->attributes_id) !!}
                            {!! Form::hidden("variation_options[".$variation->variation_id."][".$options->attributes_id."][options_id]",$options->options_id) !!}
                            {!! $options->option->name . (($loop->last) ? '' : ' -') !!}
                        @endforeach
                    </td>
                    <td class="text-right">
                        <input type="text" name="product_discount[0][price]"
                                                  value="88.0000" placeholder="Price"
                                                  class="form-control"/></td>
                    <td class="text-left" style="width: 20%;">
                        <div class="input-group ">
                            <input type="text" name="product_discount[0][date_start]" value=""
                                   placeholder="Date Start" data-date-format="YYYY-MM-DD"
                                   class="form-control date"/>
                            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
</span></div>
                    </td>
                    <td class="text-left" style="width: 20%;">
                        <div class="input-group ">
                            <input type="text" name="product_discount[0][date_end]" value=""
                                   placeholder="Date End" data-date-format="YYYY-MM-DD"
                                   class="form-control date"/>
                            <span class="input-group-btn">
<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
</span></div>
                    </td>
                    <td class="text-left">
                        <button type="button" onclick="$('#discount-row0').remove();"
                                data-toggle="tooltip" title="Remove" class="btn btn-danger"><i
                                    class="fa fa-minus-circle"></i></button>
                    </td>
                </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6"></td>
                    <td class="text-left">
                        <button type="button" onclick="addDiscount();" data-toggle="tooltip"
                                title="Add Discount" class="btn btn-primary"><i
                                    class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>

{!! Form::close() !!}
