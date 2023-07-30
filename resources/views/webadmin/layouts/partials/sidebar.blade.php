<aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
    <!-- Sidebar Menu -->
    <nav class="sidebar-nav">
        <ul class="nav in side-menu">

            <li class="current-page"><a href="{{ route('webadmin.dashboard') }}"><i class="list-icon feather feather-command"></i> <span class="hide-menu">Dashboard</span></a></li>
            <li class="current-page"><a href="{{ route('webadmin.users.index') }}"><i class="list-icon feather feather-command"></i> <span class="hide-menu">Users</span></a></li>
            <li class="current-page">
                <a class="dropdown-item" href="{{ route('webadmin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="list-icon feather feather-command"></i>
                    <span class="hide-menu">{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('webadmin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <!-- /.side-menu -->
    </nav>
    <!-- /.sidebar-nav -->
</aside>