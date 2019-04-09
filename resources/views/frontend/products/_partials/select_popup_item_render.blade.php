@if(count($items))
    @foreach($items as $item)
        <li data-id="{{ $item->id }}" class="col-lg-2 col-md-3 col-sm-6 mb-2 single-item-wrapper">
            <div class="single-item">
                <div class="img-item">
                    <img src="{{ (media_image_tmb($item->image)) }}" class="img-fluid" alt="img">
                </div>
                <div class="name-item">
                    <span>
                        {{ $item->name }}
                        @if($item->item->qty <= 0)
                            <b>(Out OF Stock)</b>
                        @endif
                    </span>
                </div>
            </div>
        </li>
    @endforeach
@endif


