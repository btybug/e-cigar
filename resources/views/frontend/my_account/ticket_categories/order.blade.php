<label>Select Order Code</label>
{!! Form::select('order_id',$user->orders->pluck('code','id'),null,['class'=>'form-control']) !!}
