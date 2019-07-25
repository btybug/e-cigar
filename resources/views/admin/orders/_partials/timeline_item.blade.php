@foreach($histories as $history)
    <li class="timeline_item">
        <div class="timeline-item-left-col">
            <div>
                <div class="date-time-wrap">
                    <span class="timeline-item-left-col_dtls font-main-bold font-18">{!! BBgetDateFormat($history->created_at) !!}</span>
                    <span class="timeline-item-left-col_dtls font-16 time">{!! BBgetTimeFormat($history->created_at) !!}</span>
                </div>
                <img src="/public/admin_theme/dist/img/user2-160x160.jpg">

            </div>
        </div>
        <div class="timeline-item-right-col">
            <div>
                @if($history->status_id)
                    <div class="status-holder" style="background: {{ $history->status->color }}">{!! $history->status->name !!}</div>
                @endif
                <p class="status-massage">
                    {!! $history->note !!}
                </p>
            </div>
        </div>
    </li>
@endforeach
