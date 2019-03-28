@if(count($variations))
    @foreach($variations as $variation)
        @include("frontend.products._partials.multi_menu_variation");
    @endforeach
@endif
