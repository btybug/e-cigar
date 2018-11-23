@php
    $uniqueID = uniqid();
@endphp
<tr>
    <td class="w-20">
        <select name="test_options[{{ $uniqueID }}][attr_id]" class="form-control">
           @foreach($allAttrs as $allAttr)
               <option value="{{ $allAttr->id }}">{{ $allAttr->name }}</option>
            @endforeach
        </select>
    </td>
    <td class="w-70">
        <input data-role="tagsinput" value="{{ implode(',',$allAttr->children->pluck('name')->all()) }}">
        <input type="hidden" name="test_options[{{ $uniqueID }}][options]"
               value="{{ implode(',',$allAttr->children->pluck('id')->all()) }}">
    </td>
    <td colspan="2" class="text-right">
        <button type="button" class="btn btn-danger"><i
                    class="fa fa-minus-circle"></i></button>
    </td>
</tr>