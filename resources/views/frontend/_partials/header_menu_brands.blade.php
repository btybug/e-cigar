@php


$categories = \App\Models\Brands::all();
@endphp

@foreach($categories as $category)
    <div class="col-lg-3 col-sm-6">
        <div class="single-product">
            <a href="{!! route('brands',$category->slug) !!}" class="d-block">
            <div class="product-photo">
                <img src="{!! media_image_tmb($category['image']) !!}" alt="{!! $category['name'] !!}" title="{!! $category['name'] !!}">
            </div>
            <div class="product-content">
                <div class="product-title-more d-flex flex-wrap justify-content-between align-items-center">
                    <div class="product-title">
                        <h5 class="font-25 font-sec-bold text-uppercase m-0">{!! $category['name'] !!}</h5>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
@endforeach
