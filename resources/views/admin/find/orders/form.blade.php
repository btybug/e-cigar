
{!! Form::open(['class' => 'form-horizontal','url' => route('find_orders_results'),'id' => 'findForm']) !!}
<div class="row">

    <div class="col-sm-6">
        <div class="form-group row">
            <label for="barcode" class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-10">
                <input type="text" name="code" class="form-control" id="barcode" placeholder="Product barcode">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="product-id" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <input type="text" name="amount" class="form-control" id="product-id" placeholder="product id">
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
