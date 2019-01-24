You received a message from {!! $data['email'] !!}

<p>
   Name: {!! $data['name'] !!}
</p>
@if(isset($data['phone']))
<p>
    Phone: {!! $data['phone'] !!}
</p>
@endif

<p>
    {!! $data['email'] !!}
</p>

<p>
    Message: {!! $data['message'] !!}
</p>