<div class="col-sm-12 pl-0 m-l-5 menu-item-selected" data-id="{{ $variation->id }}">
    <div class="d-flex flex-wrap align-items-center">
        <div class="col-sm-7">
            <a href="javascript:void(0)" class="btn btn-sm delete-menu-item cl-red"><i class="fa fa-times"></i></a>
            {{ $variation->name }}
        </div>
        <div class="col-sm-3 ">
            <label class="d-flex mb-0"><span class="text-bold mr-2 align-self-center">Qty:</span>
                {!! Form::number('qty',1,['class' => 'form-control w-50','data-id' => $variation->id]) !!}
            </label>
        </div>
        <div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
            @if($variation->price_per =='item')
            <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
                {{ convert_price($variation->price,$currency) }}
            </span>
            @endif
        </div>
    </div>
</div>
