@foreach($model->type_attrs as $modelattr)
    @php
        $options = $model->type_attrs_pivot()->with('sticker')->where('attributes_id',$modelattr->id)->get();
    @endphp

    @if(\View::exists('frontend.products._partials.single.'.$modelattr->pivot->type))
        @include('frontend.products._partials.single.'.$modelattr->pivot->type)
    @endif
@endforeach
