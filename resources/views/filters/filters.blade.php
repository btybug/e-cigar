@if($filters->count())
    @foreach($category->filters as $key=>$filter)
        <li class="col-md-3" data-id="{!! $filter->id !!}">
            <div class="item-content">
                <div class="item-photo">
                    <img src="{!! ($filter->image)?url($filter->image):null !!}" alt="photo">
                </div>
                <div class="item-title">
                    <span>{!! $filter->first_child_label !!}</span>
                </div>
            </div>
        </li>
    @endforeach
    @endif

@foreach($filters->last()->children as $key=>$filter)
            <li class="col-md-3" data-id="{!! $filter->id !!}">
                <div class="item-content">
                    <div class="item-photo">
                        <img src="{!! ($filter->image)?url($filter->image):null !!}" alt="photo">
                    </div>
                    <div class="item-title">
                        <span>{!! $filter->first_child_label !!}</span>
                    </div>
                </div>
            </li>
@endforeach
