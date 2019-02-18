<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="{!! url('public/admin_theme/dist/img/user2-160x160.jpg') !!}" class="img-circle"--}}
                     {{--alt="User Image">--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
                {{--<p>Alexander Pierce</p>--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- search form -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->
        <ul class="sidebar-menu" data-widget="tree">
            {{--<li class="header">MAIN NAVIGATION</li>--}}
            @ok('admin_dashboard')
            <li><a href="{{route('admin_dashboard')}}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
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
                    <li><a href="{{route('admin_staff')}}"><i class="far fa-circle"></i>Staff</a></li>
                    @endok
                    <li><a href="{{route('admin_customers')}}"><i class="far fa-circle"></i>Customers</a></li>
                    @ok('admin_role_membership')
                    <li><a href="{{route('admin_role_membership')}}"><i class="fa fa-circle-o"></i>Role/Membership</a>
                    </li>
                    @endok
                    @ok('admin_campaign')
                    <li><a href="{{route('admin_campaign')}}"><i class="far fa-circle"></i>Campaign</a>
                    </li>
                    @endok
                </ul>
            </li>
            @endok
            @ok('admin_inventory')
            <li class="treeview">
                <a href="#">
                    <i class="fab fa-dropbox"></i>
                    <span>Inventory</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @ok('admin_items')
                    <li><a href="{{route('admin_items')}}"><i class="far fa-circle"></i>Items</a></li>
                    @endok
                    @ok('admin_warehouses')
                    <li><a href="{{route('admin_warehouses')}}"><i class="far fa-circle"></i>Warehouses</a></li>
                    @endok
                    @ok('admin_store_purchase')
                    <li><a href="{{route('admin_store_purchase')}}"><i class="far fa-circle"></i> Purchase</a></li>
                    @endok
                    @ok('admin_suppliers')
                    <li><a href="{{route('admin_suppliers')}}"><i class="far fa-circle"></i>Suppliers</a></li>
                    @endok

                    @ok('admin_other')
                    <li><a href="{{route('admin_inventory_other')}}"><i class="far fa-circle"></i>Other</a></li>
                    @endok
                </ul>
            </li>
            @endok
            @ok('admin_stock')
            <li class="treeview">
                <a href="#">
                    <i class="fab fa-dropbox"></i>
                    <span>Store</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @ok('admin_stock')
                    <li><a href="{{route('admin_stock')}}"><i class="far fa-circle"></i>Products</a></li>
                    @endok
                    @ok('admin_orders')
                    <li><a href="{{route('admin_orders')}}"><i class="far fa-circle"></i> All orders</a></li>
                    @endok

                    @ok('admin_store_transactions')
                    <li><a href="{{route('admin_store_transactions')}}"><i class="far fa-circle"></i> Transactions</a></li>
                    @endok
                    <li><a href="{{route('admin_store_coupons')}}"><i class="far fa-circle"></i> Coupons</a></li>

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
                    <li><a href="{{route('admin_blog')}}"><i class="far fa-circle"></i> Posts</a></li>
                    <li><a href="{{route('show_comments')}}"><i class="far fa-circle"></i> Comments</a></li>
                    <li><a href="{{route('admin_faq')}}"><i class="far fa-circle"></i> FAQ</a></li>
                    @ok('admin_blog_contact_us')
                    <li><a href="{{route('admin_blog_contact_us')}}"><i class="far fa-circle"></i>Contact us</a></li>
                    @endok
                    <li><a href="{{route('admin_tickets')}}"><i class="far fa-circle"></i> Tickets</a></li>
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
                    <li><a href="{{route('admin_seo')}}"><i class="far fa-circle"></i> General</a></li>
                    @ok('admin_seo_bulk')
                    <li><a href="{{route('admin_seo_bulk')}}"><i class="far fa-circle"></i> Bulk</a></li>
                    @endok
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
                    @ok('admin_categories_list')
                    <li><a href="{{route('admin_categories_list')}}"><i class="far fa-circle"></i> Categories</a></li>
                    @endok
                    @ok('admin_stock_tags')
                    <li><a href="{{route('admin_stock_tags')}}"><i class="far fa-circle"></i> Tags</a></li>
                    @endok
                    @ok('admin_stock_statuses')
                    <li><a href="{{route('admin_stock_statuses')}}"><i class="far fa-circle"></i> Statuses</a></li>
                    @endok
                    @ok('admin_store_attributes')
                    <li><a href="{{route('admin_store_attributes')}}"><i class="far fa-circle"></i> Attributes</a></li>
                    @endok
                    @ok('admin_tools_stickers')
                    <li><a href="{{route('admin_tools_stickers')}}"><i class="far fa-circle"></i> Stickers</a></li>
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
                    <li><a href="{{route('admin_emails_notifications_emails')}}"><i
                                    class="far fa-circle"></i>Emails</a></li>
                    @endok
                    @ok('admin_emails_newsletters')
                        <li><a href="{{route('admin_emails_newsletters')}}"><i
                                    class="far fa-circle"></i>Newsletters</a></li>
                    @endok
                    @ok('admin_emails_notifications_send_email')
                    <li><a href="{{route('admin_emails_notifications_send_email')}}"><i class="far fa-circle"></i>Notifications</a>
                    </li>
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
                    <li><a href="{{route('admin_settings_languages')}}"><i class="far fa-circle"></i> Languages</a>
                    </li>

                    @ok('admin_settings_general')
                    <li><a href="{{route('admin_settings_general')}}"><i class="far fa-circle"></i> General</a></li>
                    @endok
                    @ok('admin_settings_store')
                    <li><a href="{{route('admin_settings_store')}}"><i class="far fa-circle"></i>Store</a></li>
                    @endok
                    @ok('admin_settings_events')
                    <li><a href="{{route('admin_settings_events')}}"><i class="far fa-circle"></i>Events</a></li>
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
                    <li><a href="{{route('admin_manage_api')}}"><i class="far fa-circle"></i>Manage</a></li>
                    @ok('admin_manage_api_products')
                    <li><a href="{{route('admin_manage_api_products')}}"><i class="far fa-circle"></i>Products</a></li>
                    @endok
                    @ok('admin_manage_api_items')
                    <li><a href="{{route('admin_manage_api_items')}}"><i class="far fa-circle"></i>Items</a></li>
                    @endok
                </ul>

            </li>
            @endok
            {{--@ok('admin_dashboard')--}}
            <li><a href="{{route('import_index')}}"><i class="fa fa-download" aria-hidden="true"></i>
                    <span>Import</span></a></li>
            {{--@endok--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>