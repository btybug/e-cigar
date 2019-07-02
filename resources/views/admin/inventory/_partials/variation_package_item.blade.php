@php
    $uniqueID = uniqid();
@endphp
<tr>
    <td>
        {!! Form::select("variations[$main_unique][variations][$uniqueID][item_id]",$stockItems,($package_variation) ? $package_variation->item_id : null,['class' => 'form-control v-item-change']) !!}
    </td>
    <td>
        {!! Form::text("variations[$main_unique][variations][$uniqueID][name]",($package_variation) ? $package_variation->name : null,['class' => 'form-control v-name']) !!}
        {!! Form::hidden("variations[$main_unique][variations][$uniqueID][id]",($package_variation) ? $package_variation->id : null) !!}
    </td>
    <td>
        <span class="v-qty">{!! ($package_variation && $package_variation->qty) ? $package_variation->qty : 0 !!}</span>
        {!! Form::hidden("variations[$main_unique][variations][$uniqueID][qty]",($package_variation) ? $package_variation->qty : null) !!}
    </td>
    <td>
        {!! media_button("variations[$main_unique][variations][$uniqueID][image]",($package_variation) ? $package_variation->image : null ) !!}
    </td>
    <td class="package_price @if(! $main || ($main && $main->price_per == 'product')) hide @endif">
        {!! Form::number("variations[$main_unique][variations][$uniqueID][price]",($package_variation) ? $package_variation->price : null,['class' => 'form-control v-price']) !!}
        <a href="javascript:void(0)" class="btn btn-info add-discount">Discount price</a>

    </td>
    <td>
        <button type="button" class="btn btn-danger delete-package-option delete-v-option_button"><i class="fa fa-trash"></i></button>
    </td>
</tr>
