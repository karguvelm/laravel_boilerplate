<!-- HEADER & TOP NAVIGATION -->
<nav class="navbar">
    <!-- Logo Area -->
    <div class="navbar-header">
        <a href="{{ route('webadmin.dashboard') }}" class="navbar-brand">
            <img class="logo-expand" alt="" src="{{ asset('webadmin/img/logo-dark.png')}}">
            <img class="logo-collapse" alt="" src="{{ asset('webadmin/img/logo-collapse.png')}}">
        </a>
    </div>
    <!-- /.navbar-header -->
    <!-- Left Menu & Sidebar Toggle -->
    <ul class="nav navbar-nav">
        <li class="sidebar-toggle dropdown"><a href="javascript:void(0)" class="ripple"><i class="feather feather-menu list-icon fs-20"></i></a>
        </li>
    </ul>
    <!-- /.navbar-left -->            
    <div class="spacer"></div>
    <!-- User Image with Dropdown -->
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple" data-toggle="dropdown">
                <span class="avatar thumb-xs2"><img src="{{ asset('webadmin/img/no-user-image.png')}}" class="rounded-circle" alt=""> 
                    <i class="feather feather-chevron-down list-icon"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                <div class="card">                            
                    <ul class="list-unstyled card-body">
                        <li><a href="#"><span><span class="align-middle">Welcome {{ auth()->user()->name }}</span></span></a></li>
{{--                        <li><a href="{{ route('webadmin.editprofile') }}"><span><span class="align-middle">My Profile</span></span></a></li>--}}
                        <li>
                            <a class="dropdown-item" href="{{ route('webadmin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('webadmin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.dropdown-card-profile -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-nav -->
</nav>