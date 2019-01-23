<div class="single-product-row-repeatable d-flex align-items-center">
    <label class="product-single-info_label text-uppercase mb-0">{!! $promotionAttr->name !!}:</label>
    <select  data-name="{{ $promotionAttr->id }}" data-id="productPack{{ $promotionAttr->id }}"
            class="select-variation-poption select-2 select-2--no-search main-select main-select-2arrows single-product-select product-pack-select" style="width: 453px">
        @foreach($poptions as $item)
            <option value="{{ $item->sticker->id }}">{{ $item->sticker->name }}</option>
        @endforeach
    </select>
</div>