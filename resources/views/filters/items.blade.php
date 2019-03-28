@foreach($items as $item)
    <li class="col-md-3">
        <div class="wrap-item position-relative">
            <a href="#" class="item-link">
                                        <span class="item-img">
                                            <img src="{!! $item->image !!}"
                                                 alt="item">
                                        </span>
                <span class="name">{!! $item->name !!}</span>
            </a>
        </div>
    </li>
@endforeach
