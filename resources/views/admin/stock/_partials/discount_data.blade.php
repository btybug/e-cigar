@if(isset($ajax) && $ajax == false)
    {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount_type]",$package_variation->discount_type) !!}
    @foreach($package_variation->discounts as $key => $datum)
        @if($package_variation->discount_type == 'range')
            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][from]",$datum->from) !!}
            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][to]",$datum->to) !!}
            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum->price) !!}
        @else
            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][qty]",$datum->qty) !!}
            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum->price) !!}
        @endif
    @endforeach
@else
    @if(count($data))
        @foreach($data as $key => $datum)
            {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount_type]",$type) !!}
            @if($type == 'range')
                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][from]",$datum['from']) !!}
                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][to]",$datum['to']) !!}
                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum['price']) !!}
            @else
                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][qty]",$datum['qty']) !!}
                {!! Form::hidden("variations[$main_unique][variations][$uniqueID][discount][$key][price]",$datum['price']) !!}
            @endif
        @endforeach
    @endif
@endif
