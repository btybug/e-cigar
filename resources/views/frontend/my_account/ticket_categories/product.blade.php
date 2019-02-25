<label>Select Product</label>
{!! Form::select('product_id',\App\Models\Stock::all()->pluck('name','id'),null,['class'=>'form-control']) !!}
