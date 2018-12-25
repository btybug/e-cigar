<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! url('public/admin_theme/dist/img/user2-160x160.jpg') !!}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @ok('admin_dashboard')
            <li><a href="{{route('admin_dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @endok
            {{--<li><a href="{{route('admin_passport')}}"><i class="fa  fa-user-secret"></i> <span>Passport</span></a></li>--}}
            @ok('admin_media')
            <li><a href="{{route('admin_media')}}"><i class="fa fa-picture-o"></i> <span>Media</span></a></li>
            @endok
            @ok('admin_customers')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-group"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @ok('admin_customers')
                    <li><a href="{{route('admin_staff')}}"><i class="fa fa-circle-o"></i>Staff</a></li>
                    @endok
                    <li><a href="{{route('admin_customers')}}"><i class="fa fa-circle-o"></i>Customers</a></li>
                    @ok('admin_role_membership')
                    <li><a href="{{route('admin_role_membership')}}"><i class="fa fa-circle-o"></i>Role/Membership</a>
                    </li>
                    @endok
                </ul>
            </li>
            @endok
            @ok('admin_store')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dropbox"></i>
                    <span>Inventory</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @ok('admin_items')
                    <li><a href="{{route('admin_items')}}"><i class="fa fa-circle-o"></i>Items</a></li>
                    @endok
                    {{--@ok('admin_store_purchase')--}}
                    {{--<li><a href="{{route('admin_store_purchase')}}"><i class="fa fa-circle-o"></i> Purchase</a></li>--}}
                    {{--@endok--}}
                    {{--@ok('admin_suppliers')--}}
                    {{--<li><a href="{{route('admin_suppliers')}}"><i class="fa fa-circle-o"></i>Suppliers</a></li>--}}
                    {{--@endok--}}
                    {{--@ok('admin_sale_channels')--}}
                    {{--<li><a href="{{route('admin_sale_channels')}}"><i class="fa fa-circle-o"></i>Sale Channels</a></li>--}}
                    {{--@endok--}}
                    {{--@ok('admin_other')--}}
                    {{--<li><a href="{{route('admin_inventory_other')}}"><i class="fa fa-circle-o"></i>Other</a></li>--}}
                    {{--@endok--}}
                </ul>
            </li>
            @endok
            @ok('admin_store')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dropbox"></i>
                    <span>Store</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @ok('admin_stock')
                    <li><a href="{{route('admin_stock')}}"><i class="fa fa-circle-o"></i>Products</a></li>
                    @endok
                    @ok('admin_store_attributes')
                    <li><a href="{{route('admin_store_attributes')}}"><i class="fa fa-circle-o"></i> Attributes</a></li>
                    @endok
                    @ok('admin_orders')
                    <li><a href="{{route('admin_orders')}}"><i class="fa fa-circle-o"></i> All orders</a></li>
                    @endok
                    <li><a href="{{route('admin_store_coupons')}}"><i class="fa fa-circle-o"></i> Coupons</a></li>

                </ul>
            </li>
            @endok
            @ok('admin_blog')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_blog')}}"><i class="fa fa-circle-o"></i> Posts</a></li>
                    <li><a href="{{route('show_comments')}}"><i class="fa fa-circle-o"></i> Comments</a></li>
                    <li><a href="{{route('admin_faq')}}"><i class="fa fa-circle-o"></i> FAQ</a></li>
                </ul>
            </li>
            @endok
            @ok('admin_seo')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>SEO</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_seo')}}"><i class="fa fa-circle-o"></i> General</a></li>
                    @ok('admin_seo_bulk')
                    <li><a href="{{route('admin_seo_bulk')}}"><i class="fa fa-circle-o"></i> Bulk</a></li>
                    @endok
                </ul>
            </li>
            @endok
            @ok('admin_forum')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-forumbee"></i>
                    <span>Forum</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_forum')}}"><i class="fa fa-circle-o"></i> Show</a></li>
                </ul>
            </li>
            @endok
            @ok('admin_tickets')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-ticket"></i>
                    <span>Tickets</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_tickets')}}"><i class="fa fa-circle-o"></i> list</a></li>
                </ul>
            </li>
            @endok
            @ok('admin_tools')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <span>Tools</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @ok('admin_tools')
                    <li><a href="{{route('admin_tools')}}"><i class="fa fa-circle-o"></i> Tools</a></li>
                    @endok
                    @ok('admin_categories_list')
                    <li><a href="{{route('admin_categories_list')}}"><i class="fa fa-circle-o"></i> Categories</a></li>
                    @endok
                    @ok('admin_stock_tags')
                    <li><a href="{{route('admin_stock_tags')}}"><i class="fa fa-circle-o"></i> Tags</a></li>
                    @endok
                    @ok('admin_tools_logs')
                    <li><a href="{{ route('admin_tools_logs') }}"><i class="fa fa-circle-o"></i> Logs</a></li>
                    @endok
                    @ok('admin_stock_statuses')
                    <li><a href="{{route('admin_stock_statuses')}}"><i class="fa fa-circle-o"></i> Statuses</a></li>
                    @endok
                    @ok('admin_tools_stickers')
                    <li><a href="{{route('admin_tools_stickers')}}"><i class="fa fa-circle-o"></i> Stickers</a></li>
                    @endok
                </ul>
            </li>
            @endok
            @ok('admin_emails_notifications_send_email')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Emails & Notifications</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @ok('admin_emails_notifications_emails')
                    <li><a href="{{route('admin_emails_notifications_emails')}}"><i class="fa fa-circle-o"></i>Emails</a></li>
                    @endok
                    @ok('admin_emails_notifications_notifications')
                    <li><a href="{{route('admin_emails_notifications_notifications')}}"><i class="fa fa-circle-o"></i>Notifications</a></li>
                    @endok
                    @ok('admin_emails_notifications_send_email')
                    <li><a href="{{route('admin_emails_notifications_send_email')}}"><i class="fa fa-circle-o"></i>Send</a></li>
                    @endok

                </ul>
            </li>
            @endok
            @ok('admin_settings_languages')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_settings_languages')}}"><i class="fa fa-circle-o"></i> Languages</a>
                    </li>

                    @ok('admin_settings_general')
                    <li><a href="{{route('admin_settings_general')}}"><i class="fa fa-circle-o"></i> General</a></li>
                    @endok
                    @ok('admin_settings_store')
                    <li><a href="{{route('admin_settings_store')}}"><i class="fa fa-circle-o"></i>Store</a></li>
                    @endok
                    @ok('admin_settings_events')
                    <li><a href="{{route('admin_settings_events')}}"><i class="fa fa-circle-o"></i>Events</a></li>
                    @endok
                </ul>
            </li>
            @endok
            @ok('admin_manage_api')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-handshake-o"></i>
                    <span>Manage Api</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_manage_api')}}"><i class="fa fa-circle-o"></i>Manage</a></li>
                    @ok('admin_manage_api_settings')
                    <li><a href="{{route('admin_manage_api_settings')}}"><i class="fa fa-circle-o"></i>Settings</a></li>
                    @endok
                    @ok('admin_manage_api_products')
                    <li><a href="{{route('admin_manage_api_products')}}"><i class="fa fa-circle-o"></i>Products</a></li>
                    @endok
                    @ok('admin_manage_api_items')
                    <li><a href="{{route('admin_manage_api_items')}}"><i class="fa fa-circle-o"></i>Items</a></li>
                    @endok
                </ul>

            </li>
            @endok
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>