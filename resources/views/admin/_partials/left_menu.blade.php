<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! url('public/admin_theme/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
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

            <li><a href="{{route('admin_dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            {{--<li><a href="{{route('admin_passport')}}"><i class="fa  fa-user-secret"></i> <span>Passport</span></a></li>--}}
            <li><a href="{{route('admin_media')}}"><i class="fa fa-picture-o"></i> <span>Media</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-group"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_users')}}"><i class="fa fa-circle-o"></i> Show</a></li>
                    <li><a href="{{route('admin_role_membership')}}"><i class="fa fa-circle-o"></i>Role/Membership</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dropbox"></i>
                    <span>Store</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_store_categories')}}"><i class="fa fa-circle-o"></i> Categories</a></li>
                    <li><a href="{{route('admin_store')}}"><i class="fa fa-circle-o"></i> Products</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_blog')}}"><i class="fa fa-circle-o"></i> Show</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
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
                    <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-ticket"></i>
                    <span>Tickets</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_tickets')}}"><i class="fa fa-circle-o"></i> Show</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <span>Tools</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin_tools')}}"><i class="fa fa-circle-o"></i> Show</a></li>
                    <li><a href="{{ route('admin_tools_tags') }}"><i class="fa fa-circle-o"></i> Tags</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>