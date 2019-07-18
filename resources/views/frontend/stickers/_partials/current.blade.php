<div class="d-flex flex-wrap brands_main-content-top margin-b-brands-top">
    <div class="brands_main-content-top-photo">
        <img src="{!! $current->image !!}" alt="big-brands">
    </div>
    <div class="brands_main-content-top-right">
        <div class="text-center right-main-img">
            <img src="/public/img/brands/brands-monster.png" alt="brand">
        </div>
        <h2 class="text-center font-sec-reg font-26 mb-0 lh-1">{{ $current->name }}</h2>
        <ul class="d-flex flex-wrap brands_right-list">
            {{--@if(count($current->stickers))--}}
            {{--@foreach($current->stickers as $sticker)--}}
            {{--<li class="col brands_right-list-item">--}}
            {{--<div class="brands_right-list-item-photo">--}}
            {{--<img src="{{ $sticker->image }}" alt="brand">--}}
            {{--</div>--}}
            {{--<div--}}
            {{--class="font-15 text-uppercase brands_right-list-item-name red-brand-clr">--}}
            {{--{{ $sticker->name }}--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--@endforeach--}}
            {{--@endif--}}
        </ul>
        <div class="d-flex brands_main-content-top-more more-info-btn">
            <span class="name">Read more</span>
            <span class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="13px" height="10px"
                                                viewBox="0 0 13 10"
                                            >
<path fill-rule="evenodd" fill="rgb(81, 132, 229)"
      d="M7.000,10.000 L13.000,-0.000 C13.000,-0.000 11.738,-0.000 10.000,-0.000 C9.578,0.969 7.000,6.000 7.000,6.000 C7.000,6.000 3.553,0.844 3.000,-0.000 C1.262,-0.000 -0.000,-0.000 -0.000,-0.000 L7.000,10.000 Z"/>
</svg>
                                        </span>


        </div>
    </div>
    <div class="d-none brands_main-content-top-info">
        <p class="brand-info-desc">
            {!! $current->description !!}
        </p>
        <ul class="d-flex flex-wrap brands_main-content-top-tags">
            <li>
                <a href="#" class="tag-link blue-bg-tag">E- Juice</a>
            </li>
            <li>
                <a href="#" class="tag-link red-bg-tag">Uk Brand</a>
            </li>
            <li>
                <a href="#" class="tag-link green-bg-tag">Premium</a>
            </li>
        </ul>
        <div class="d-flex brands_main-content-top-more less-info-btn">
            <span class="name">VIEW LESS</span>
            <span class="icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="13px" height="10px"
                                                viewBox="0 0 13 10"
                                            >
<path fill-rule="evenodd" fill="rgb(81, 132, 229)"
      d="M7.000,10.000 L13.000,-0.000 C13.000,-0.000 11.738,-0.000 10.000,-0.000 C9.578,0.969 7.000,6.000 7.000,6.000 C7.000,6.000 3.553,0.844 3.000,-0.000 C1.262,-0.000 -0.000,-0.000 -0.000,-0.000 L7.000,10.000 Z"/>
</svg>
                                        </span>
        </div>
    </div>
</div>

<div class="brands_main-content-products-wrapper" id="sticker_related_products_list">
@include('frontend.stickers._partials.products')
</div>
