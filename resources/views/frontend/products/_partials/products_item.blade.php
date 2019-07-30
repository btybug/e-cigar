<li class="col-md-6 col-xl-3">
    <div class="products__item-wrapper main-transition">
        <div class="products__item-wrapper-inner">
            <a href="{{ route('product_single', ['type' =>"vape", 'slug' => $product->slug]) }}" class="products__item-top">
                    <span class="d-block products__item-photo-brand-name">
                        <span class="font-sec-reg text-uppercase d-block text-center text-truncate products__item-brand-name font-16 text-sec-clr lh-1">
                            @if($product->brand)
                                {{ $product->brand->name }}
                            @else
                                No brand
                            @endif
                        </span>
                        <span class="position-relative products__item-photo d-block">
                            <img src="{{ (media_image_tmb($product->image)) }}" alt="product">
                            {{--<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-new">new</span>--}}
                            {{--<span class="position-absolute font-main-bold font-16 products__item-photo-inner products__item-less">-50%</span>--}}
                        </span>
                    </span>
                <span class="products__item-main-content">
                    <span class="products__item-photo-thumb">
                         <span class="products__item-photo-thumb-item active-slider">
                            <img src="{{ (media_image_tmb($product->image)) }}" alt="{{ $product->name }}">
                         </span>
                        @if($product->variations)
                            @php $count = 0; @endphp
                            @foreach($product->variations()->take(3)->get() as $variation)
                                @if($variation->image)
                                    @php $count++; @endphp
                                    <span class="products__item-photo-thumb-item">
                                        <img src="{{ (media_image_tmb($variation->image)) }}" alt="{{ $variation->name }}">
                                    </span>
                                @endif
                            @endforeach
                        @endif
                    </span>
                    <span class="products__item-content-inner">
                        <span class="font-sec-reg font-21 text-main-clr products__item-title text-truncate">
                            {{ str_limit($product->name,27) }}
                        </span>
                        <span class="font-main-light font-15 products__item-desc">
                            {{ str_limit($product->short_description,50) }}
                        </span>
                        <span class="d-flex flex-wrap justify-content-between align-items-center products__item-price-discount">
                            <span class="d-flex flex-wrap align-items-center products__item-discount-all">
                                @if(count($product->stickers))
                                    @foreach($product->stickers()->take(2)->get() as $sticker)
                                         <span class="products__item-discount">
                                             <img src="{{ $sticker->image }}" alt="{{ $sticker->name }}">
                                         </span>
                                    @endforeach
                                @endif
                            </span>
                            <span class="d-flex flex-wrap products__item-prices">
                                @if($product->new_price)
                                    <span class="font-sec-reg text-gray-clr font-18 align-self-end products__item-sec-price">
                                         {{ convert_price($product->new_price,$currency, false) }}
                                    </span>
                                    <span class="font-sec-bold font-24 text-tert-clr products__item-main-price">
                                        {{ convert_price($product->price,$currency, false) }}
                                    </span>
                                @else
                                    <span class="font-sec-bold font-24 text-tert-clr products__item-main-price">
                                        {{ convert_price($product->price,$currency, false) }}
                                    </span>
                                @endif
                            </span>
                        </span>
                    </span>
                </span>
            </a>
            <div  class="flex-wrap justify-content-between align-items-center products__item-bottom">
                <a href="{{ route('product_single', ['type' =>"vape", 'slug' => $product->slug]) }}"
                   class="d-flex align-items-center justify-content-center font-15 text-tert-clr text-uppercase products__item-view-more">
                    view more
                </a>
                @if(Auth::check())
                <span class="products__item-favourite product-card_like-icon {{ ($product->in_favorites()->where('user_id',\Auth::id())->first())?'active':null}}">
                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="18px"
                                            viewBox="0 0 20 18"
                                        >
                                            <path fill-rule="evenodd" opacity="0.949" fill="rgb(227, 230, 237)"
                                                  d="M14.700,-0.002 C13.057,-0.002 11.419,0.767 10.360,2.016 C9.300,0.767 7.663,-0.002 6.020,-0.002 C3.036,-0.002 0.720,2.306 0.720,5.281 C0.720,8.936 3.996,11.916 9.009,16.336 L10.360,17.678 L11.711,16.336 C16.723,11.916 19.999,8.936 19.999,5.281 C19.999,2.306 17.684,-0.002 14.700,-0.002 L14.700,-0.002 Z"/>
                                        </svg>
                </span>
                @endif
            </div>
        </div>
    </div>
</li>
