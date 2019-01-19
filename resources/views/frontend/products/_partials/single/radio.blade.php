<div class="single-product-row-repeatable d-flex align-items-center flex-md-row flex-column">
    <p class="product-single-info_label text-uppercase mb-0">{!! $modelattr->name !!}:</p>
    @if(count($options))
        @foreach($options as $item)
            <div class="product-single-info_custom-control custom-control custom-radio">
                <input type="radio" id="rm{{ $item->id }}" class="custom-control-input select-variation-radio-option" data-name="{{ $modelattr->id }}"
                       name="rate{{ $modelattr->id }}"  value="{{ $item->sticker->id }}" {{ ($loop->first) ? 'checked' : '' }} >
                <label class="product-single-info_radio-label custom-control-label font-15 text-gray-clr pointer" for="rm{{ $item->id }}">{{ $item->sticker->name }}</label>
            </div>
        @endforeach
    @endif
</div>
