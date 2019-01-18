<div class="single-product-row-repeatable d-flex align-items-center flex-md-row flex-column">
    <p class="product-single-info_label text-uppercase mb-0">{!! $promotionAttr->name !!}:</p>
    @if(count($poptions))
        @foreach($poptions as $item)
            <div class="product-single-info_custom-control custom-control custom-radio">
                <input  data-name="{{ $promotionAttr->id }}" type="radio" id="pr{{ $item->id.$pkey }}" class="custom-control-input select-variation-radio-poption"
                       name="pr{{ $promotionAttr->id.$pkey }}"  value="{{ $item->sticker->id }}" {{ ($loop->first) ? 'checked' : '' }} >
                <label class="product-single-info_radio-label custom-control-label font-15 text-gray-clr pointer" for="pr{{ $item->id.$pkey }}">{{ $item->sticker->name }}</label>
            </div>
        @endforeach
    @endif
</div>