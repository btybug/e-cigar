@php
    $uniqueID = uniqid();
@endphp
<li style="display: flex"
    class="option-elm-attributes"><a
            href="#">{{ $option['option_name'] }}</a>
    <div class="buttons">
        <a href="javascript:void(0)"
           class="btn btn-sm edit-extra-option btn-warning"><i
                    class="fa fa-pencil"></i></a>
        <a href="javascript:void(0)"
           class="remove-extra-option btn btn-sm btn-danger"><i
                    class="fa fa-trash"></i></a>
    </div>
    <input type="hidden" name="extra_options[{{ $uniqueID }}][options]"
           value="{{ json_encode($option,true) }}" class="extra-item-data">
    <input type="hidden" name="extra_options[{{ $uniqueID }}][name]"
           value="{{ $option['option_name'] }}" class="extra-item-name">
</li>