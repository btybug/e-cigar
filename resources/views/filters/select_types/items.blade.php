{{--@foreach($items as $items)--}}
    {{--<li data-id="{{ $items->id }}"--}}
        {{--class="option-elm-attributes col-md-3">--}}
        {{--<div class="wrap-item">--}}
            {{--<a href="#">--}}
                {{--<span><img src="{!! url($items->image) !!}" alt=""></span>--}}
                {{--<span class="name">{!! $items->name !!}</span>--}}
            {{--</a>--}}
            {{--<input type="hidden" name="stocks[]" value="{{ $items->id }}">--}}
        {{--</div>--}}
    {{--</li>--}}
{{--@endforeach--}}
<div class="col-sm-6">
{!! Form::select('items[]',[null=>'Select Product']+$items->pluck('name','id')->toArray(),null,['class'=>'select-2 main-select main-select-2arrows single-product-select product--select-items select2-hidden-accessible','required'=>true,'style'=>'width:100%']) !!}
</div>
