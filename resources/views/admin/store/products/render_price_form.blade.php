<div class="row">
    @if(isset($attrs) && count($attrs))
        @foreach($attrs as $attribute)
            <label class="col-md-4">
                {!! $attribute->name !!}
            </label>
            <div class="col-md-8">
                @php
                    $opptionAttr = $model->stockAttrs()->where('attributes_id',$attribute->id)->first();
                @endphp
                @if($opptionAttr && count($opptionAttr->children))
                    <select class="form-control select-attr-option">
                        @foreach($opptionAttr->children as $item)
                            <option value="{{ $item->attr->id }}">{{ $item->attr->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        @endforeach
    @endif
</div>