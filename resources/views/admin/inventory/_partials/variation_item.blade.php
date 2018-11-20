@php
    if(is_object($item)){
        $variationOptions = $item->options;
        $item = $item->toArray();
        $item['attributes'] = $item['options'];
    }
@endphp
<tr class="list-attrs-single-item">
    <td>
        {!! $item['name'] !!}
        {!! Form::hidden('variations[]',json_encode($item,true)) !!}
    </td>
    <td>
        @if(count($item['attributes']))
            @foreach($item['attributes'] as $attribute)
                <p>{{ \App\Models\Attributes::getById($attribute['attributes_id']) }} : {{ \App\Models\Attributes::getById($attribute['options_id']) }}</p>
            @endforeach
        @endif
    </td>
    <td>
        {!! $item['variation_id'] !!}
    </td>
    <td>
        {!! $item['price'] !!}
    </td>
    <td>
        <a class="remove-variation btn btn-danger"><i class="fa fa-trash-o"></i></a>
        @if(isset($item['id']))
            <a data-id="{{ $item['id'] }}" class="edit-variation btn btn-warning"><i class="fa fa-pencil"></i></a>
        @endif
    </td>
</tr>