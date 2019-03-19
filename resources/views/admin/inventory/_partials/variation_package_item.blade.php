@php
    $uniqueID = uniqid();
@endphp
<tr>
    <td>
        {!! Form::text("package_variation[$uniqueID][name]",($package_variation) ? $package_variation->name : null,['class' => 'form-control']) !!}
        {!! Form::hidden("package_variation[$uniqueID][id]",($package_variation) ? $package_variation->id : null) !!}
    </td>
    <td>
        {!! Form::select("package_variation[$uniqueID][variation_id]",$stockItems,($package_variation) ? $package_variation->variation_id : null,['class' => 'form-control']) !!}
    </td>
    <td>
        {!! ($package_variation && $package_variation->qty) ? $package_variation->qty : 0 !!}
        {!! Form::hidden("package_variation[$uniqueID][qty]",($package_variation) ? $package_variation->qty : null) !!}
    </td>
    <td>
        {!! media_button("package_variation[$uniqueID][image]",($package_variation) ? $package_variation->image : null ) !!}
    </td>
    <td class="package_price hide">
        {!! Form::number("package_variation[$uniqueID][price]",($package_variation) ? $package_variation->price : null,['class' => 'form-control']) !!}
    </td>
    <td>
        <button type="button" class="btn btn-danger delete-v-option delete-v-option_button"><i class="fa fa-trash"></i></button>
    </td>
</tr>
