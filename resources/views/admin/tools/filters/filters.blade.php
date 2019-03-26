@foreach($filters as $key=>$filter)
    @if($filter->children()->exists())
        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-md-2 col-xs-12">{!! $filter->first_child_label !!}</label>
                <div class="col-md-10">
                    {!! Form::select('filters[]',[null=>'Select Parent']+$filter->children()->get()->pluck('name','id')->toArray(),(isset($children[$key+1]))?$children[$key+1]:null,['class'=>'form-control filter-select','required'=>true]) !!}
                </div>
            </div>
        </div>
    @endif
@endforeach
