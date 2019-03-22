<div class="del-save--btn">
    @if($parent)
        <div class="form-group m-r-5">
            <a class="btn btn-danger delete-button text-white" data-key="{{ $parent->id }}" data-href="#">Delete</a>
        </div>
    @endif

</div>

{!! Form::model($parent,['url'=>route('post_admin_tools_filters_add_child',$parent->id),'class' => 'updated-form']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('child_id',($child)?$child->id:null) !!}
@if(count(get_languages()))
    <ul class="nav nav-tabs">
    @foreach(get_languages() as $language)
            <li class="nav-item"><a class="nav-link @if($loop->first) active @endif" data-toggle="tab" href="#{{ strtolower($language->code) }}">
                    <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}</a></li>
    @endforeach
    </ul>
@endif


<div class="tab-content">
    @if(count(get_languages()))
        @foreach(get_languages() as $language)
            <div id="{{ strtolower($language->code) }}" class="tab-pane fade  @if($loop->first) in active show @endif">
                <div class="form-group row mt-10">
                    <label class="col-md-2 col-xs-12">Filter Name</label>
                    <div class="col-md-10">
                        {!! Form::text('translatable['.strtolower($language->code).'][name]',($child)?get_translated($child,strtolower($language->code),'name'):null,['class'=>'form-control','required'=>true]) !!}
                    </div>

                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="form-group row mt-10">
    <label class="col-md-2 col-xs-12">Parent</label>
    <div class="col-md-10">
        {!! Form::select('parent_id',[$parent->id=>'Current Filter']+$parent->children()->where('id','!=',$child_id)->get()->pluck('name','id')->toArray(),$parent->id,['class'=>'form-control','required'=>true]) !!}
    </div>

</div>
    <div class="card panel panel-default mt-20 releted__products-panel">
        <div class="card-header panel-heading d-flex justify-content-between align-items-center">
                                        <span>
                                            Related Products
                                        </span>
            <button type="button" class="btn btn-primary select-products"><i class="fa fa-plus fa-sm mr-10"></i>Add Product</button>
        </div>
        <div class="card-body panel-body product-body">
            <ul class="get-all-attributes-tab row">

            </ul>
        </div>
    </div>
{!! Form::close() !!}

