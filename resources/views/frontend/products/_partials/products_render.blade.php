@if(isset($all_products))
    <div class="selected__filters">
        <ul class="d-inline-block">
            @if(count($selecteds))
                @foreach($selecteds as $key => $selected)
                    <li data-key="{{ $key }}" class="single-item position-relative">
                        <span class="remove-icon">×</span>
                        {{ $selected }}
                    </li>
                @endforeach
            @endif
            @if(count($selectedBrands))
                @foreach($selectedBrands as $key => $selected)
                    <li data-key="{{ $key }}" class="single-item position-relative">
                        <span class="remove-icon">×</span>
                        {{ $selected }}
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endif

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
