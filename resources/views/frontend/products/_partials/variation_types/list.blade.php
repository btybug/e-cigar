<div class="col-sm-12 pl-0">
    Select {{ $vSettings->count_limit }} items
</div>
@foreach($variation as $item)
<div class="col-sm-10 pl-0">
    {{ $item->name }}
</div>
<div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
    <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
        {{ convert_price($item->price,$currency) }}
    </span>
</div>
@endforeach
