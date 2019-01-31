<label>Select Order Code</label>
{!! Form::select('order_code',$user->orders->pluck('code','code'),null,['class'=>'form-control']) !!}