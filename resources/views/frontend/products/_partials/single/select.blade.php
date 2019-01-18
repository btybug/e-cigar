<div class="single-product-row-repeatable d-flex flex-md-row flex-column align-items-center">
    <label for="singlePacksField{{ $modelattr->id }}" class="product-single-info_label text-uppercase mb-0">{!! $modelattr->name !!}:</label>
    <select id="singlePacksField{{ $modelattr->id }}" data-id="productPack{{ $modelattr->id }}" data-name="{{ $modelattr->id }}"
            class="select-variation-option select-2 select-2--no-search main-select main-select-2arrows single-product-select product-pack-select" style="width: 453px">
        @foreach($options as $item)
            <option value="{{ $item->sticker->id }}">{{ $item->sticker->name }}</option>
        @endforeach
    </select>
</div>
