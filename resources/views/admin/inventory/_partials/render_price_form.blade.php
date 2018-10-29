<div class="row">
    @php
        $modelAttributes = $model->forRender();
    @endphp

    @if(count($modelAttributes))
        <div class="col-md-12">
            @foreach($modelAttributes as $modelattr)
                <label class="col-md-4">
                    {!! $modelattr->name !!}
                </label>
                <div class="col-md-8">
                    @php
                        $options = \App\Models\StockVariationOption::where('attributes_id',$modelattr->id)
                        ->whereIn('variation_id',(count($variations))?$variations->pluck('id')->all():$variations)
                        ->groupBy('options_id')->get();
                    @endphp
                    @if(count($options))
                        <select data-name="{{ $modelattr->id }}" class="form-control select-variation-option">
                            @foreach($options as $item)
                                <option value="{{ $item->option->id }}">{{ $item->option->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="col-md-12 price-place">
            {{--{{ $variations->first()->price }}--}}
        </div>
    @endif
</div>