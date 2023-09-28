<!-- Navbar -->
<nav class="navbar-custom">
    <ul class="list-unstyled topbar-nav float-right mb-0">
        <li class="dropdown hide-phone">
            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i data-feather="search" class="topbar-icon"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-lg p-0">
                <!-- Top Search Bar -->
                <div class="app-search-topbar">
                    <form action="#" method="get">
                        <input type="search" name="search" class="from-control top-search mb-0" placeholder="Type text...">
                        <button type="submit"><i class="ti-search"></i></button>
                    </form>
                </div>
            </div>
        </li>

        <li class="dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <span class="ml-1 nav-user-name hidden-sm">Nick</span>
                <img src="{{ asset('dastone/assets/images/users/user-5.jpg')}}" alt="profile-user" class="rounded-circle thumb-xs" />
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile</a>
                <a class="dropdown-item" href="#"><i data-feather="settings" class="align-self-center icon-xs icon-dual mr-1"></i> Settings</a>
                <div class="dropdown-divider mb-0"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Logouts</a>
                </form>
            </div>
        </li>
    </ul><!--end topbar-nav-->

    <ul class="list-unstyled topbar-nav mb-0">
        <li>
            <button class="nav-link button-menu-mobile">
                <i data-feather="menu" class="align-self-center topbar-icon"></i>
            </button>
        </li>

    </ul>
</nav>
<!-- end navbar-->
