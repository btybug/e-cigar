@if($package_variation->price_type == 'range')

    <div class="col-md-12 range-box">
        @foreach($package_variation->discounts as $key => $datum)
            <div class="d-flex flex-wrap discount-item">
                <div class="col-md-3">
                    <label>From</label>
                    {!! Form::number("variations[$main_unique][variations][$uniqueID][discount][$key][from]",$datum->from,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                    <label>To</label>
                    {!! Form::number("variations[$main_unique][variations][$uniqueID][discount][$key][to]",$datum->to,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4">
                    <label>Price/Item</label>
                    {!! Form::number("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum->price,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2 align-self-end">
                    <button class="btn btn-danger remove-discount-item">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-2 offset-md-10 pl-1">
        <a class="btn btn-primary add-range-discount add-discount-field" href="javascript:void(0)"><i
                class="fa fa-plus"></i></a>
    </div>
@else
    <div class="col-md-12 fixed-box">


        @foreach($package_variation->discounts as $key => $datum)
            <div class="d-flex flex-wrap discount-item ">
                <div class="col-md-5">
                    <label>Qty</label>
                    {!! Form::number("variations[$main_unique][variations][$uniqueID][discount][$key][qty]",$datum->qty,['class' => 'form-control']) !!}
                </div>

                <div class="col-md-5">
                    <label>Total price</label>
                    {!! Form::number("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum->price,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger remove-discount-item">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-2 offset-md-10 pl-1">
        <a class="btn btn-primary add-fixed-discount add-discount-field" href="javascript:void(0)"><i
                class="fa fa-plus"></i></a>
    </div>
@endif


{{--@if(isset($ajax) && $ajax == false)--}}
{{--    {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount_type]",$package_variation->discount_type,['data-type-discount' => 'discount_type']) !!}--}}
{{--    @foreach($package_variation->discounts as $key => $datum)--}}
{{--        @if($package_variation->discount_type == 'range')--}}
{{--            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][from]",$datum->from,['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][to]",$datum->to,['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum->price,['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--        @else--}}
{{--            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][qty]",$datum->qty,['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum->price,['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--@else--}}
{{--    @if(count($data))--}}
{{--        @foreach($data as $key => $datum)--}}
{{--            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount_type]",$type,['data-type-discount' => 'discount_type']) !!}--}}
{{--            @if($type == 'range')--}}
{{--                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][from]",$datum['from'],['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][to]",$datum['to'],['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum['price'],['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--            @else--}}
{{--                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][qty]",$datum['qty'],['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum['price'],['data-type-discount' => 'discount','data-key' => $key]) !!}--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    @endif--}}
{{--@endif--}}
