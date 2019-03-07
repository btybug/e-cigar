@inject('widget','App\Services\Widgets')
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3>{!! $widget->userRegistrations() !!}</h3>

            <p>User Registrations</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="{!! route('admin_customers') !!}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
