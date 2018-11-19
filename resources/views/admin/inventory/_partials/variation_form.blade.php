{!! Form::model($model,['id' => 'variation_form']) !!}
<div class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(count($data))
                    @foreach($data as $key => $items)
                        <div class="col-md-4">
                            {!! Form::hidden("attributes[$key][attributes_id]",$key) !!}
                            <div class="form-group">
                                <label>{{ \App\Models\Attributes::getById($key) }}</label>
                                <select name="attributes[{{ $key }}][option_id]" class="form-control">
                                    @foreach($items as $option)
                                        <option value="{{ $option }}">{{ \App\Models\Attributes::getById($option) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <label for="variation_id"
                                       class="control-label col-sm-4">Variation
                                    ID</label>
                                <div class="col-sm-8">
                                    {!! Form::text('variation_id',null,['id' => 'variation_id','class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <label for="variation_image"
                                       class="control-label col-sm-4">Image</label>
                                <div class="col-sm-8">
                                    {!! media_button('image',$model) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <label for="variation_quantity"
                                       class="control-label col-sm-4">Quantity</label>
                                <div class="col-sm-8">
                                    {!! Form::number('qty',null,['id' => 'variation_qty','class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <label for="variation_quantity_alert"
                                       class="control-label col-sm-4">Quantity
                                    Alert</label>
                                <div class="col-sm-8">
                                    {!! Form::text('qty_alert',null,['id' => 'variation_qty_alert','class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <label for="variation_quantity"
                                       class="control-label col-sm-4">Price</label>
                                <div class="col-sm-8">
                                    {!! Form::text('price',null,['id' => 'variation_price','class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}