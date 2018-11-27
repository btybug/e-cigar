@php
    $uniqueID = uniqid();
@endphp
<tr class="v-options-list-item">
    <td class="w-20">
        <select data-uid="{{ $uniqueID }}" name="type_attributes[{{ $uniqueID }}][attributes_id]" class="form-control select-attribute" placeholder="Select">
               <option val="">Select</option>
           @foreach($allAttrs as $allAttr)
               <option {{ (isset($selected) && $selected->id == $allAttr->id) ? 'selected' : '' }} value="{{ $allAttr->id }}">{{ $allAttr->name }}</option>
            @endforeach
        </select>
    </td>
    <td class="w-70">
        @php
            if(isset($noAjax)){
                if(isset($selected) && $selected && $model){
                    $type_options = implode(',',$model->type_attrs_pivot()->where('attributes_id',$selected->id)->pluck('sticker_id','sticker_id')->all());
                    $type_options_name = implode(',',$model->type_attrs_pivot()->with('sticker')->where('attributes_id',$selected->id)->get()->pluck('sticker.name')->all());
                }else{
                    $type_options = '';
                    $type_options_name = '';
                }
            }else{
                $type_options = (isset($selected) && $selected) ? implode(',',$selected->stickers->pluck('id')->all()) : '';
                $type_options_name = (isset($selected) && $selected) ? implode(',',$selected->stickers->pluck('name')->all()) : '';
            }
        @endphp
        <input data-role="tagsinput" class="tag-input-v v-input-{{ $uniqueID }}" value="{{ $type_options_name }}">
        <input type="hidden" class="input-items-value" name="type_attributes[{{ $uniqueID }}][options]"
               value="{{ $type_options }}">
    </td>
    <td colspan="2" class="text-right">
        <button type="button" class="btn btn-danger"><i
                    class="fa fa-minus-circle delete-v-option"></i></button>
    </td>
</tr>