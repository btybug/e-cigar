@php
    $uniqueID = uniqid();
@endphp
<tr>
    <td>
        {!! Form::select("variations[$main_unique][variations][$uniqueID][item_id]",$stockItems,$item->id,['class' => 'form-control v-item-change']) !!}
    </td>
    <td>
        {!! Form::text("variations[$main_unique][variations][$uniqueID][name]",$item->name,['class' => 'form-control v-name']) !!}
        {!! Form::hidden("variations[$main_unique][variations][$uniqueID][id]",null) !!}
    </td>
    <td>
        <span class="v-qty">0</span>
        {!! Form::hidden("variations[$main_unique][variations][$uniqueID][qty]",null) !!}
    </td>
    <td>
        {!! media_button("variations[$main_unique][variations][$uniqueID][image]",$item->image ) !!}
    </td>
    <td class="package_price @if($main && $main->price_per == 'product') hide @endif">
        {!! Form::number("variations[$main_unique][variations][$uniqueID][price]",($package_variation) ? $package_variation->price : null,['class' => 'form-control v-price']) !!}
    </td>
    <td>
        <button type="button" class="btn btn-danger delete-package-option delete-v-option_button"><i class="fa fa-trash"></i></button>
    </td>
</tr>
