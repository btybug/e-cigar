<div class="d-flex flex-md-row flex-column align-items-center product-single-info_range-outer">
    <label class="product-single-info_label text-uppercase mb-0">{!! $modelattr->name !!}:</label>
    <div class="range-steps d-flex">
        @if(count($options))
            @foreach($options as $item)
                <div class="range-steps_item {{ ($loop->first) ? 'active' : '' }}">
                    <label for="rm{{ $item->id }}"></label>
                    <input type="radio" id="rm{{ $item->id }}"  class="select-variation-radio-option"  data-name="{{ $modelattr->id }}"
                           {{ ($loop->first) ? 'checked' : '' }} value="{{ $item->sticker->id }}" name="rate{{ $modelattr->id }}">
                    <span class="range-steps_count font-15 font-sec-bold">{{ $item->sticker->name }}aaa</span>
                </div>
            @endforeach
        @endif
    </div>
</div>


