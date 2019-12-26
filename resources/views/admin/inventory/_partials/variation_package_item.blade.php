@php
    $uniqueID = uniqid();
@endphp
<div class="shock__edit-tr stock-items-tabs-wall--wrap">
    <div class="stock-items-tab-photo-td">
        <div class="d-flex">
            <div class="stock-item-photo-wrap">
                <div class="item-photo">
                    @if($package_variation && $package_variation->image)
                        <img src="{{ $package_variation->image }}" alt="photo" class="v-img">
                    @elseif($main && $main->stock)
                        <img src="{{ $main->stock->image }}" alt="photo"  class="v-img">
                    @else
                        <img src="/public/images/no_image.png" alt="photo"  class="v-img">
                    @endif
                </div>
                <select name="variations[{{ $main_unique }}][variations][{{ $uniqueID }}][item_id]"
                        class="form-control v-item-change">
                    @if($package_variation->item->is_archive)
                        <option value="{{ $package_variation->item_id }}"
                                selected>{{ $package_variation->name }}</option>
                    @endif
                    @foreach ($stockItems as $key => $value)
                        <option
                            value="{{ $key }}" {{ ($package_variation && $key == $package_variation->item_id) ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="stock-item-name-desc ml-2">
                <select name="variations[{{ $main_unique }}][variations][{{ $uniqueID }}][image]" class="form-control select-v-img">
                    @if($main && $main->stock)
                        <option value="{{ $main->stock->image }}" selected>Main Image</option>
                        @if($main->stock->other_images && count($main->stock->other_images))
                            @foreach ($main->stock->other_images as $key => $value)
                                <option
                                    value="{{ $value }}" {{ ($package_variation && $value == $package_variation->image) ? 'selected' : '' }}>
                                    Extra Image {{$key+1}}
                                </option>
                            @endforeach
                        @endif
                    @endif
                </select>

                <div class="my-1">
                    {!! Form::text("variations[$main_unique][variations][$uniqueID][name]",($package_variation) ? $package_variation->name : null,['class' => 'form-control v-name']) !!}
                    {!! Form::hidden("variations[$main_unique][variations][$uniqueID][id]",($package_variation) ? $package_variation->id : null) !!}
                </div>
                <div class="stock-item-desc">
                    {!! Form::textarea("variations[$main_unique][variations][$uniqueID][description]",($package_variation) ? $package_variation->description : null,
['class' => 'form-control stock-tiny-area','style' => 'height:300px !important;']) !!}

                </div>
            </div>
        </div>

        {!! Form::hidden("variations[$main_unique][variations][$uniqueID][qty]",($package_variation) ? $package_variation->qty : null) !!}
        {{--{!! Form::select("variations[$main_unique][variations][$uniqueID][item_id]",$stockItems,($package_variation) ? $package_variation->item_id : null,--}}
        {{--['class' => 'form-control v-item-change']) !!}--}}
    </div>
    {{--    <td>--}}
    {{--        <span class="v-qty">--}}
    {{--            @if($package_variation && $package_variation->item)--}}
    {{--                {!! $package_variation->item->purchase->sum('qty')-$package_variation->item->others->sum('qty') !!}--}}
    {{--            @else--}}
    {{--                0--}}
    {{--            @endif--}}
    {{--            --}}{{--{!! ($package_variation && $package_variation->qty) ? $package_variation->qty : 0 !!}--}}
    {{--        </span>--}}

    {{--    </td>--}}
    {{--    <td>--}}
    {{--        {!! media_button("variations[$main_unique][variations][$uniqueID][image]",($package_variation) ? $package_variation->image : null ) !!}--}}
    {{--    </td>--}}
    <div
        class="package_price stock-items-tab-prices @if(! $main || ($main && $main->price_per == 'product')) d-none @endif ">
        <div class="row flex-nowrap">
            <div class="col-md-4">
                {!! Form::select("variations[$main_unique][variations][$uniqueID][price_type]",['dynamic' => 'Dynamic option','static' => 'Static',
            'fixed' => 'Discount fixed','range'=>'Discount range'],
                ($package_variation) ? $package_variation->price_type : null,['class' => 'form-control price-type-change','main_unique' => $main_unique,'unique' => $uniqueID]) !!}
            </div>
            <div class="col-md-8">
                <div
                    class="price-static @if($package_variation && $package_variation->price_type =='static') show @else d-none @endif">
                    {!! Form::number("variations[$main_unique][variations][$uniqueID][price]",($package_variation) ? $package_variation->price : null,
                    ['class' => 'form-control v-price','step' => 'any']) !!}
                </div>
                <div data-main="{{ $main_unique }}" data-group="{{ $uniqueID }}"
                     class="price-discount @if($package_variation && ( $package_variation->price_type =='fixed' ||  $package_variation->price_type =='range')) show @else d-none @endif">
                    <div class="discount-data-v discount-type-box" data-main="{{ $main_unique }}"
                         data-group="{{ $uniqueID }}">
                        @if($package_variation && count($package_variation->discounts))
                            @include("admin.stock._partials.discount_data",['ajax' => false])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="stock-items-tab-delete-td">
        <button type="button" class="btn btn-danger delete-package-option delete-v-option_button"><i
                class="fa fa-trash"></i></button>
    </div>
</div>

{{--<tr class="shock__edit-tr">--}}
{{--    <td>--}}
{{--        <select name="variations[{{ $main_unique }}][variations][{{ $uniqueID }}][item_id]" class="form-control v-item-change">--}}
{{--            @if($package_variation->item->is_archive)--}}
{{--                <option value="{{ $package_variation->item_id }}"  selected>{{ $package_variation->name }}</option>--}}
{{--            @endif--}}
{{--            @foreach ($stockItems as $key => $value)--}}
{{--                <option value="{{ $key }}" {{ ($package_variation && $key == $package_variation->item_id) ? 'selected' : '' }}>--}}
{{--                    {{ $value }}--}}
{{--                </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        <a href="javascript:void(0);" class="btn btn-primary btn-sm stock-toggle-tiny__btn mt-1">--}}
{{--            @if($package_variation && $package_variation->description)--}}
{{--                Edit--}}
{{--            @else--}}
{{--                <i class="fa fa-plus"></i>--}}
{{--            @endif--}}
{{--        </a>--}}
{{--        <div class="desc-box">--}}
{{--            @if($package_variation && $package_variation->description)--}}
{{--                {!! $package_variation->description !!}--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="stock-toggle-tiny__wrapper">--}}
{{--            {!! Form::textarea("variations[$main_unique][variations][$uniqueID][description]",($package_variation) ? $package_variation->description : null,['class' => 'form-control stock-tiny-area']) !!}--}}

{{--        </div>--}}
{{--        --}}{{--{!! Form::select("variations[$main_unique][variations][$uniqueID][item_id]",$stockItems,($package_variation) ? $package_variation->item_id : null,--}}
{{--        --}}{{--['class' => 'form-control v-item-change']) !!}--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        {!! Form::text("variations[$main_unique][variations][$uniqueID][name]",($package_variation) ? $package_variation->name : null,['class' => 'form-control v-name']) !!}--}}
{{--        {!! Form::hidden("variations[$main_unique][variations][$uniqueID][id]",($package_variation) ? $package_variation->id : null) !!}--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        <span class="v-qty">--}}
{{--            @if($package_variation && $package_variation->item)--}}
{{--                {!! $package_variation->item->purchase->sum('qty')-$package_variation->item->others->sum('qty') !!}--}}
{{--            @else--}}
{{--                0--}}
{{--            @endif--}}
{{--            --}}{{--{!! ($package_variation && $package_variation->qty) ? $package_variation->qty : 0 !!}--}}
{{--        </span>--}}
{{--        {!! Form::hidden("variations[$main_unique][variations][$uniqueID][qty]",($package_variation) ? $package_variation->qty : null) !!}--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        {!! media_button("variations[$main_unique][variations][$uniqueID][image]",($package_variation) ? $package_variation->image : null ) !!}--}}
{{--    </td>--}}
{{--    <td class="package_price  @if(! $main || ($main && $main->price_per == 'product')) d-none @endif ">--}}
{{--        <div class="d-flex">--}}
{{--            <div class="col-md-6">--}}
{{--                {!! Form::select("variations[$main_unique][variations][$uniqueID][price_type]",['' => 'Choose','static' => 'Static','discount' => 'Discount'],--}}
{{--                ($package_variation) ? $package_variation->price_type : null,['class' => 'form-control price-type-change']) !!}--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="price-static @if($package_variation && $package_variation->price_type =='static') show @else d-none @endif">--}}
{{--                    {!! Form::number("variations[$main_unique][variations][$uniqueID][price]",($package_variation) ? $package_variation->price : null,--}}
{{--                    ['class' => 'form-control v-price','step' => 'any']) !!}--}}
{{--                </div>--}}
{{--                <div class="price-discount @if($package_variation && $package_variation->price_type =='discount') show @else d-none @endif">--}}
{{--                    <a data-main="{{ $main_unique }}" data-group="{{ $uniqueID }}" href="javascript:void(0)" class="btn btn-info add-discount">Discount price</a>--}}
{{--                    <div class="discount-data-v" data-d-v="{{ $uniqueID }}">--}}
{{--                        @if($package_variation && count($package_variation->discounts))--}}
{{--                            @include("admin.stock._partials.discount_data",['ajax' => false])--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        <button type="button" class="btn btn-danger delete-package-option delete-v-option_button"><i--}}
{{--                class="fa fa-trash"></i></button>--}}
{{--    </td>--}}
{{--</tr>--}}
