<select id="city" readonly="true" class="form-control">
    <option selected>{!! __('choose') !!}...</option>
    @php
        $old=$country->regions->pluck('name','name')->toArray();
    $getRegions=getRegions($country->name);
    @endphp
    @foreach($getRegions as $region)

        <option value="{!! $region !!}"
                @if(isset($old[$region])) selected @endif>{!! $region !!}</option>
    @endforeach
</select>
