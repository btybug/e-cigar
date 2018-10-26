<div class="row">
    @php
      $modelAttributes = (isset($stockAttrs))? $stockAttrs->where('is_shared',true) : $model->stockAttrs()->with('attr')->where('is_shared',true)->get();
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


<div class="row">
    <h2>Testing</h2>
    @php
        $modelAttributes = $model->variations;
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