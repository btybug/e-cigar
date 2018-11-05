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
                    {{--{!! Form::text('color',null,['class'=>'form-control','required'=>true]) !!}--}}
                    <div class="color_select_wall">
                        <select id="colorselector_2">
                            <option value="106" data-color="#A0522D">sienna</option>
                            <option value="47" data-color="#CD5C5C" selected="selected">indianred</option>
                            <option value="87" data-color="#FF4500">orangered</option>
                            <option value="17" data-color="#008B8B">darkcyan</option>
                            <option value="18" data-color="#B8860B">darkgoldenrod</option>
                            <option value="68" data-color="#32CD32">limegreen</option>
                            <option value="42" data-color="#FFD700">gold</option>
                            <option value="77" data-color="#48D1CC">mediumturquoise</option>
                            <option value="107" data-color="#87CEEB">skyblue</option>
                            <option value="46" data-color="#FF69B4">hotpink</option>
                            <option value="47" data-color="#CD5C5C">indianred</option>
                            <option value="64" data-color="#87CEFA">lightskyblue</option>
                            <option value="13" data-color="#6495ED">cornflowerblue</option>
                            <option value="15" data-color="#DC143C">crimson</option>
                            <option value="24" data-color="#FF8C00">darkorange</option>
                            <option value="78" data-color="#C71585">mediumvioletred</option>
                            <option value="123" data-color="#000000">black</option>
                        </select> <br />
                        {{--<button class="btn" type="button" id="setColor">set by color (#008B8B)</button>--}}
                        {{--<button class="btn" type="button" id="setValue">set by value (18)</button>--}}
                        <input type="text" id="colorValue" />
                        <input type="text" id="colorColor" />
                        <input type="text" id="colorTitle" />
                    </div>
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