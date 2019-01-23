<div class="d-flex flex-wrap align-items-center product-single-info_colors-outer">
    <label class="product-single-info_label text-uppercase mb-0 col-sm-2 pl-0 mr-0">{!! $modelattr->name !!}</label>
    <div class="col-sm-8 px-sm-3 px-0">
        <div class="product-single-colors">
            <div class="d-flex flex-wrap">
                @if(count($options))
                    @foreach($options as $item)
                        <div class="product-single-colors_item">
                            <input type="radio"  name="rate{{ $modelattr->id }}" value="{{ $item->sticker->id }}" data-name="{{ $modelattr->id }}"
                                   id="cl{{ $item->id }}" {{ ($loop->first) ? 'checked' : '' }}  class="select-variation-radio-option"/>
                            <label class="pointer d-inline-block mb-0" for="cl{{ $item->id }}" style="background-color: {{ $item->sticker->color }}"></label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-2 p-0 text-sm-center"></div>

</div>
