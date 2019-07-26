<table class="table table--store-settings">
    <thead>
        <tr class="">
            <th colspan="4" class="text-left pl-2">Locations</th>

        </tr>
        <tr class="bg-my-light-pink">
            <th>Warehouse</th>
            <th>Rack</th>
            <th>Shelve</th>
            <th>Qty</th>
        </tr>
    </thead>

    <tbody class="v-options-list-locations">
    @if($model && $model->locations)
        @foreach($model->locations as $location)
            <tr class="v-options-list-item location-item">
                <td>
                    <div class="form-control">{{ ($location->warehouse)?$location->warehouse->name:null }}</div>
                </td>
                <td>
                    <div class="form-control">{{ ($location->rack)?$location->rack->name:null }}</div>
                </td>
                <td>
                    @if($location->rack)
                        @php
                            $shelve = $location->rack->children()->where('id',$location->shelve_id)->first();
                        @endphp
                        <div class="form-control">{{ ($shelve)?$shelve->name:null }}</div>
                    @endif
                </td>
                <td colspan="2" class="text-right">
                    {!! Form::number("qty[$location->id]",null,['class' => 'form-control']) !!}
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

