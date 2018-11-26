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
    </td>
    <td>
        @if(count($item['options']))
            @foreach($item['options'] as $key => $items)
                {!! Form::hidden("options[$key][attributes_id]",$key,['class' => 'option-class']) !!}
                @php
                    $selectedValue = null;
                @endphp
                @if(isset($model['options'][$loop->index ]) && $model['options'][$loop->index ]['attributes_id'] == $key)
                    @php $selectedValue = $model['options'][$loop->index ]['options_id']; @endphp
                @endif
                {{--<label>{{ \App\Models\Attributes::getById($key) }}</label>--}}
                <select name="options[{{ $key }}][options_id]" class="form-control">
                    @foreach($items as $option)
                        <option {{ ($selectedValue == $option) ? 'selected' : '' }} value="{{ $option }}">{{ \App\Models\Stickers::getById($option) }}</option>
                    @endforeach
                </select>
            @endforeach
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
