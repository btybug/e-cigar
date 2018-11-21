@php
    if(is_object($item)){
        $variationOptions = $item->options;
        $item = $item->toArray();
    }
    $uniqueID = uniqid();
@endphp
<tr class="list-attrs-single-item" validate-name="{{ $item['name'] }}" validate-sku="{{ $item['variation_id'] }}" data-variation="{{ $uniqueID }}">
    <td>
        {!! $item['name'] !!}
        {!! Form::hidden('variations[]',json_encode($item,true),['class' => 'variation-json']) !!}
    </td>
    <td>
        @if(count($item['options']))
            @foreach($item['options'] as $attribute)
                <p>{{ \App\Models\Attributes::getById($attribute['attributes_id']) }} : {{ \App\Models\Attributes::getById($attribute['options_id']) }}</p>
            @endforeach
        @endif
    </td>
    <td>
        {!! $item['variation_id'] !!}
    </td>
    <td>
        {!! $item['qty'] !!}
    </td>
    <td>
        {!! $item['price'] !!}
    </td>
    <td>
        <a class="remove-variation btn btn-danger"><i class="fa fa-trash-o"></i></a>
        <a data-id="{{ $uniqueID }}" class="edit-variation btn btn-warning"><i class="fa fa-pencil"></i></a>
    </td>
</tr>