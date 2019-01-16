@php
    if(is_object($item)){
        $item = $item->toArray();
    }
    $uniqueID = uniqid();
@endphp
<tr class="list-attrs-single-item" validate-name="{{ (isset($item['name'])) ? $item['name'] : null }}" validate-sku="{{(isset($item['variation_id'])) ? $item['variation_id'] : null }}"
    data-variation="{{ $uniqueID }}">
    <td>
        {!! Form::text("variations[$uniqueID][name]",(isset($item['name'])) ? $item['name'] : null,['class' => 'form-control']) !!}
        {!! Form::hidden("variations[$uniqueID][id]",(isset($item['id'])) ? $item['id'] : null) !!}
    </td>
    <td class="variation-options-place">
        @if(count($item['options']))
            @if(isset($model) && $model)
                @foreach($item['options'] as $items)
                    @php
                        $attributeSticker = \App\Models\AttributeStickers::find($items['attribute_sticker_id']);
                    @endphp

                    @if($attributeSticker)

                        {{--$model->type_attrs_pivot--}}
                        {!! Form::hidden("variations[$uniqueID][options][".$attributeSticker->attributes_id."][attributes_id]",$attributeSticker->attributes_id,['class' => 'option-class']) !!}
                        @php
                            $selectedValue = $attributeSticker->sticker_id;
                            $optionData = $model->type_attrs_pivot()->where('attributes_id',$attributeSticker->attributes_id)->get();
                        @endphp

                        <select data-attribute_id="{{ $attributeSticker->attributes_id }}" name="variations[{{ $uniqueID }}][options][{{ $attributeSticker->attributes_id }}][options_id]" class="form-control">
                            @foreach($optionData as $option)
                                    <option {{ ($selectedValue == $option->sticker_id) ? 'selected' : '' }} value="{{ $option->sticker_id }}">{{ \App\Models\Stickers::getById($option->sticker_id) }}</option>
                            @endforeach
                        </select>
                    @endif
                @endforeach
            @else
                @foreach($item['options'] as $key => $items)
                    {{--$model->type_attrs_pivot--}}
                    {!! Form::hidden("variations[$uniqueID][options][$key][attributes_id]",$key,['class' => 'option-class']) !!}
                    @php
                        $selectedValue = null;
                    @endphp
                    @if(isset($model['options'][$loop->index ]) && $model['options'][$loop->index ]['attributes_id'] == $key)
                        @php $selectedValue = $model['options'][$loop->index ]['options_id']; @endphp
                    @endif
                    {{--<label>{{ \App\Models\Attributes::getById($key) }}</label>--}}
                    <select data-attribute_id="{{ $key }}" name="variations[{{ $uniqueID }}][options][{{ $key }}][options_id]" class="form-control">
                        @foreach($items as $option)
                            <option {{ ($selectedValue == $option) ? 'selected' : '' }} value="{{ $option }}">{{ \App\Models\Stickers::getById($option) }}</option>
                        @endforeach
                    </select>
                @endforeach
            @endif

        @endif
    </td>
    <td>
        {!! Form::select("variations[$uniqueID][variation_id]",$stockItems,(isset($item['variation_id'])) ? $item['variation_id'] : null,['class' => 'form-control']) !!}
    </td>
    <td>
        {!! (isset($item['qty'])) ? $item['qty'] : null !!}
        {!! Form::hidden("variations[$uniqueID][qty]",(isset($item['qty'])) ? $item['qty'] : null) !!}
    </td>
    <td>
        {!! Form::text("variations[$uniqueID][price]",(isset($item['price'])) ? $item['price'] : null,['class' => 'form-control']) !!}

    </td>
    <td>
        <a class="remove-variation btn btn-danger"><i class="fa fa-trash-o"></i></a>
    </td>
</tr>
