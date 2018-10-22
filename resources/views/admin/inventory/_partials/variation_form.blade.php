{!! Form::model($model,['id' => 'variation_form']) !!}
<div class="basic-center basic-wall">
    <div class="container-fluid">
        <div class="row">
            <button variation-id="{{ $variationID }}" type="button" class="btn btn-warning apply-variation">Apply</button>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <label for="variation_id"
                                       class="control-label col-sm-4">Variation
                                    ID</label>
                                <div class="col-sm-8">
                                    {!! Form::text('variation_id',null,['id' => 'variation_id','class' => 'form-control','readonly' => true]) !!}
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
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}