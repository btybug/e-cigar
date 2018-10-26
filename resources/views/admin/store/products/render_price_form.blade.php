@if(isset($stockAttrs))
<div class="row">
    @php
      $modelAttributes = $stockAttrs->where('is_shared',true);
    @endphp

    @if(count($modelAttributes))
        @foreach($modelAttributes as $modelattr)
            <label class="col-md-4">
                {!! $modelattr->attr->name !!}
            </label>
            <div class="col-md-8">
                @if($modelattr && count($modelattr->children))
                    <select class="form-control select-attr-option">
                        @foreach($modelattr->children as $item)
                            <option value="{{ $item->attr->id }}">{{ $item->attr->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        @endforeach
    @endif
</div>
@else

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
                        $options = \App\Models\ProductVariationOption::where('attributes_id',$modelattr->id)
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

@endif