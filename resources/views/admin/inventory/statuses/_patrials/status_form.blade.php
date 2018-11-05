<div class="col-md-9 options-form">
    <div class="col-md-9 options-form">
        {!! Form::model($model,['url'=>route('post_admin_stock_statuses_manage',($model?$model->id:null))]) !!}
        {!! Form::hidden('id',null) !!}
        @if(count(get_languages()))
            <ul class="nav nav-tabs">
                @foreach(get_languages() as $language)
                    <li class="@if($loop->first) active @endif"><a data-toggle="tab"
                                                                   href="#{{ strtolower($language->code) }}">
                            <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                        </a></li>
                @endforeach
            </ul>
        @endif
        <div class="tab-content">
            @if(count(get_languages()))
                @foreach(get_languages() as $language)
                    <div id="{{ strtolower($language->code) }}"
                         class="tab-pane fade  @if($loop->first) in active @endif">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10">
                                    <label>Status Name</label>
                                    {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control','required'=>true]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10">
                                    <label>Description</label>
                                    {!! Form::textarea('translatable['.strtolower($language->code).'][description]',get_translated($model,strtolower($language->code),'description'),['class'=>'form-control','required'=>true,'rows'=>5]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-10">
                    <label>Icon</label>
                    {!! Form::text('icon',null,['class'=>'form-control icon-picker','required'=>true]) !!}
                </div>
                <div class="col-md-2">
                    <i id="font-show-area"></i>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-10">
                    <label>Color</label>
                    {!! Form::text('color',null,['class'=>'form-control','required'=>true]) !!}
                </div>
                <div class="col-md-2">
                    <i id="font-show-area"></i>
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
            <a href="#" class="btn btn-success pull-right">Create Email</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>