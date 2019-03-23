@foreach($filters as $key=>$filter)
    @if($filter->children()->exists())
        <div class="form-group row mt-10">
            <label class="col-md-2 col-xs-12"></label>
            <div class="col-md-10">
                {!! Form::select('filters[]',[null=>'Select Parent']+$filter->children()->get()->pluck('name','id')->toArray(),(isset($children[$key+1]))?$children[$key+1]:null,['class'=>'form-control filter-select','required'=>true]) !!}
            </div>
        </div>
    @endif
@endforeach
