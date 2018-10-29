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
                        <select class="form-control select-attr-option">
                            @foreach($options as $item)
                                <option value="{{ $item->option->id }}">{{ $item->option->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>