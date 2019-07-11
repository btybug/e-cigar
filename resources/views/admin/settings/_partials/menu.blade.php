<ul class="nav nav-tabs" id="myTab" role="tablist">
    @ok('admin_settings_general')
    <li class="nav-item ">
        <a class="nav-link @if($active == 'general')active @endif" id="info-tab" href="{!! route('admin_settings_general') !!}" role="tab"
           aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
    </li>
    @endok
    @ok('admin_settings_accounts')
    <li class="nav-item ">
        <a class="nav-link @if($active == 'accounts')active @endif" id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
           aria-controls="accounts" aria-selected="true" aria-expanded="true">Accounts</a>
    </li>
    @endok
    <li class="nav-item ">
        <a class="nav-link @if($active == 'home')active @endif" id="general-tab" href="{!! route('admin_settings_home_page') !!}" role="tab"
           aria-controls="accounts" aria-selected="true" aria-expanded="true">Home page</a>
    </li>
    @ok('admin_settings_footer')
    <li class="nav-item ">
        <a class="nav-link @if($active == 'footer')active @endif" id="general-tab" href="{!! route('admin_settings_footer') !!}" role="tab"
           aria-controls="general" aria-selected="true" aria-expanded="true">Footer</a>
    </li>
    @endok
    @ok('admin_settings_main_pages')
    <li class="nav-item ">
        <a class="nav-link @if($active == 'main_pages')active @endif" id="general-tab" href="{!! route('admin_settings_main_pages') !!}" role="tab"
           aria-controls="general" aria-selected="true" aria-expanded="true">Main Pages</a>
    </li>
    @endok
    @ok('admin_settings_tc')
    <li class="nav-item">
        <a class="nav-link @if($active == 'tc')active @endif" id="general-tab" href="{!! route('admin_settings_tc') !!}" role="tab"
           aria-controls="general" aria-selected="true" aria-expanded="true">T&C</a>
    </li>
    @endok
    @ok('admin_settings_connections')
    <li class="nav-item ">
        <a class="nav-link @if($active == 'connections')active @endif" id="general-tab" href="{!! route('admin_settings_connections') !!}" role="tab"
           aria-controls="general" aria-selected="true" aria-expanded="true">Connections</a>
    </li>
    @endok
    @ok('admin_settings_about_us')
    <li class="nav-item">
        <a class="nav-link  @if($active == 'about_us')active @endif" id="general-tab" href="{!! route('admin_settings_about_us') !!}" role="tab"
           aria-controls="general" aria-selected="true" aria-expanded="true">About us</a>
    </li>
    @endok
</ul>
