    @if(count($results))
        @foreach($results as $key => $items)
            @php
                $uniqueShortID = shortUniqueID();
            @endphp
            <div class="list-attrs-single-item" style="display: flex; justify-content: space-between;">
                <div>
                    <button variation-id="{!! $uniqueShortID !!}" type="button" class="variation-select"><i class="fa fa-list"></i></button>
                    {!! Form::hidden("variations[".$uniqueShortID."]",json_encode(['variation_id' => $uniqueShortID]),['id' => 'variation_'.$uniqueShortID]) !!}
                </div>
                @foreach($data as $generalKey => $options)
                    @php
                    $linked = $items[$loop->index];
                    @endphp
                    <div class="form-group">
                        <label for="exampleFormControlSelect{{ $generalKey }}">{{ $generalKey }}</label>
                        <select class="form-control" id="exampleFormControlSelect{{ $generalKey }}">
                            @foreach($options as $option)
                                <option value="{{ $option }}" @if($linked == $option) selected @endif>{{ $option }}</option>
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
