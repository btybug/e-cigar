@if(count($model->variations))
    @foreach($model->variations as $key => $items)
        @php
            $uniqueShortID = $items->variation_id;
        @endphp
        <div class="list-attrs-single-item" style="display: flex; justify-content: space-between;">
            <div>
                <button variation-id="{!! $uniqueShortID !!}" type="button" class="variation-select"><i class="fa fa-list"></i></button>
                {!! Form::hidden("variations[".$uniqueShortID."]",json_encode($items->toArray()),['id' => 'variation_'.$uniqueShortID]) !!}
            </div>
            @foreach($items->options as $options)
                {{--@php--}}
                {{--$linked = $items[$loop->index];--}}
                {{--@endphp--}}
                {!! Form::hidden("variation_options[".$uniqueShortID."][".$options->attributes_id."][attributes_id]",$options->attributes_id) !!}
                {!! Form::hidden("variation_options[".$uniqueShortID."][".$options->attributes_id."][options_id]",$options->options_id) !!}
                @php
                    $opptionAttr = $options->attr;
                @endphp
                <div class="form-group">
                    <label for="exampleFormControlSelect{{ $options->attributes_id }}">{{ $opptionAttr->name }}</label>
                    <select class="form-control" id="exampleFormControlSelect{{ $options->attributes_id }}">

                        @foreach($opptionAttr->children as $option)
                            <option value="{{ $option->id }}" @if($options->options_id == $option->id) selected @endif>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
            <div>
                <button type="button" class="remvoe-variations-select"><i class="fa fa-trash"></i></button>
            </div>
        </div>
    @endforeach
@endif
