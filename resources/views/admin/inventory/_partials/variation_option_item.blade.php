@php
    $uniqueID = uniqid();
@endphp
<tr class="v-options-list-item">
    <td class="w-20">
        <select data-uid="{{ $uniqueID }}" name="test_options[{{ $uniqueID }}][attr_id]" class="form-control select-attribute" placeholder="Select">
               <option>Select</option>
           @foreach($allAttrs as $allAttr)
               <option {{ (isset($selected) && $selected->id == $allAttr->id) ? 'selected' : '' }} value="{{ $allAttr->id }}">{{ $allAttr->name }}</option>
            @endforeach
        </select>
    </td>
    <td class="w-70">
        <input data-role="tagsinput" class="tag-input-v v-input-{{ $uniqueID }}" value="{{ (isset($selected) && $selected) ? implode(',',$selected->stickers->pluck('name')->all()) : '' }}">
        <input type="hidden" class="input-items-value" name="test_options[{{ $uniqueID }}][options]"
               value="{{ (isset($selected) && $selected) ? implode(',',$allAttr->stickers->pluck('id')->all()) : '' }}">
    </td>
    <td colspan="2" class="text-right">
        <button type="button" class="btn btn-danger"><i
                    class="fa fa-minus-circle delete-v-option"></i></button>
    </td>
</tr>