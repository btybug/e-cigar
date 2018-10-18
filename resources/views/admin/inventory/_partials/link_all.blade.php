    @if(count($results))
        @foreach($results as $key => $items)
            <div class="list-attrs-single-item" style="display: flex; justify-content: space-between;">
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
                    <button class="remvoe-variations-select"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        @endforeach
    @endif
