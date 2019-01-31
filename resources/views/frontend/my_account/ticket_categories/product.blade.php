<label>Select Order Code</label>
{!! Form::select('products',\App\Models\Stock::all()->pluck('name','id'),null,['class'=>'form-control']) !!}