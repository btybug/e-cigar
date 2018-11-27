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
    <td>
        @if(count($item['options']))
            @if($model)
                @foreach($item['options'] as $items)
                    {{--$model->type_attrs_pivot--}}
                    {!! Form::hidden("variations[$uniqueID][options][".$items['attributes_id']."][attributes_id]",$items['attributes_id'],['class' => 'option-class']) !!}
                    @php
                        $selectedValue = $items['options_id'];
                        $optionData = $model->type_attrs_pivot()->where('attributes_id',$items['attributes_id'])->get();
                    @endphp
                    <select name="variations[{{ $uniqueID }}][options][{{ $items['attributes_id'] }}][options_id]" class="form-control">
                        @foreach($optionData as $option)
                                <option {{ ($selectedValue == $option->sticker_id) ? 'selected' : '' }} value="{{ $option->sticker_id }}">{{ \App\Models\Stickers::getById($option->sticker_id) }}</option>
                        @endforeach
                    </select>
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
                    <select name="variations[{{ $uniqueID }}][options][{{ $key }}][options_id]" class="form-control">
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
