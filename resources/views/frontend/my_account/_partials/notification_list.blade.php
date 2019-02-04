@foreach($messages as $message)
    <tr style="{{ (! $message->pivot->is_read) ? 'color:black;font-wight:bold;background:gray' : '' }}">
        <th scope="row">
            <input name="notifications" value="{{ $message->id }}" class="message-checkbox" type="checkbox">
        </th>
        <td>{!! $message->updated_at !!}</td>
        <td>{!! $message->subject !!}</td>
        <td>{!! ($message->category) ? $message->category->name : null  !!} </td>
        <td><button class="ntfs-btn btn btn-info __modal rounded-0" data-toggle="modal" data-id="{!! $message->id !!}"><i class="fa fa-eye"></i></button></td>
    </tr>
@endforeach