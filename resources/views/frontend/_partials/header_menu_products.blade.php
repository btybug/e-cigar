@php

use App\Models\Category;

$categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();

@endphp

@foreach($categories as $category)
    <div class="col-lg-3 col-sm-6">
        <div class="single-product">
            <div class="product-photo">
                <img src="{!! $category['image'] !!}" alt="product1">
            </div>
            <div class="product-content">
                <div class="product-title-more d-flex flex-wrap justify-content-between align-items-center">
                    <div class="product-title">
                        <h5 class="font-25 font-sec-bold text-uppercase m-0">{!! $category['name'] !!}</h5>
                    </div>
                    <div class="product-more">
                        <div class="d-flex align-items-center">
                            <a href="{!! route('categories_front') !!}" class="text-tert-clr font-13">View more</a>
                            <span class="icon">
                        <svg
                                width="22px" height="9px"
                                viewBox="0 0 22 9"
                        >
                            <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                              d="M0.002,5.617 L16.071,5.617 L16.071,9.000 L21.996,4.500 L16.071,0.000 L16.071,3.383 L0.002,3.383 L0.002,5.617 Z"/>
                        </svg>
                    </span>
                        </div>
                    </div>
                </div>
                <div class="product-desc">
                    <p class="mb-0 font-main-light text-light-clr font-15">{!! $category['description'] !!}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach