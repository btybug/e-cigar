<div class="d-flex flex-wrap special__popup-content-right-product" data-id="{{$offer->id}}">
    <div class="special__popup-content-right-product-photo">
        <div class="inner-photo">
            <img src="{{ $offer->image }}" alt="product">
        </div>
    </div>
    <div class="special__popup-content-right-product-content">
        <div class="font-21 special__popup-content-right-product-title">
            {!! $offer->name !!}
        </div>
        <div class="d-flex flex-wrap special__popup-content-right-product-bottom">
            <span class="text-main-clr special__popup-content-right-product-price">
                {{ convert_price($price,get_currency(), false) }}
            </span>
            <a href="#"
               class="text-sec-clr special__popup-content-right-product-remove">
                Remove
            </a>
        </div>
    </div>
</div>
