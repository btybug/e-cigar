@if(count($products))
    <ul class="row products__page-list-product products__all-list-product">
        @foreach($products as $product)
            @include("frontend.products._partials.products_item")
        @endforeach
    </ul>
@else
    <div class="d-flex justify-content-center product-no_result">
        <span class="text-tert-clr font-25 font-main-bold">NO Results</span>
    </div>
@endif
