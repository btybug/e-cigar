@if(count($variations))
    @foreach($variations as $variation)
        @include("frontend.products._partials.stock_variation_option", ['selected' => $variation])
    @endforeach
@endif
