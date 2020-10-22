@if(count($offers))
    @foreach($offers['data'] as $extra)
        <div class="d-flex flex-wrap align-items-center lh-1 border p-2">
            <div class="col-1 pl-0">
                <a href="javascript:void(0)" data-id="{{ $extra['offer']->id }}" class="link-black delete-so"><span class="fas fa-trash"></span></a>
            </div>
            <div class="col-8 pl-0">
                <span class="font-sec-light font-26">{{ $extra['offer']->name }}</span>
            </div>
            <div class="col-3 d-flex justify-content-end pr-0">
               <span class="font-40 product__single-item_price ">
                       {!! convert_price($extra['price'],get_currency()) !!}
               </span>
            </div>
        </div>
    @endforeach
@endif
