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
        {!! Form::number("package_variation[$uniqueID][qty]",null,['class' => 'form-control']) !!}
    </td>
    <td>
        <button type="button" class="btn btn-danger delete-v-option"><i class="fa fa-trash"></i></button>
    </td>
</tr>
