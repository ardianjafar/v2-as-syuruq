<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="#" class="logo">
                    <span>
                        <img src="{{ asset('dastone/assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
                    </span>
            <span>
                        <img src="{{ asset('dastone/assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                        <img src="{{ asset('dastone/assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
                    </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <li>
                <a href="{{ route('dashboard.index') }}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span><span class="menu-arrow"></span></a>
            </li>

            <li>
                <a href="{{ route('posts.index') }}"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Posts</span><span class="menu-arrow"></i></span></a>

            </li>
            <li>
                <a href="{{ route('categories.index') }}"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Categories</span><span class="menu-arrow"></i></span></a>
            </li>
            <li>
                <a href="{{ route('tags.index') }}"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Tags</span><span class="menu-arrow"></i></span></a>
            </li>

            <li>
                <a href="{{ route('ctform.index') }}"><i data-feather="lock" class="align-self-center menu-icon"></i><span>Contact Form</span><span class="menu-arrow"></span></a>

            </li>
            @can('manage_roles')
            <hr class="hr-dashed hr-menu">
            <li class="menu-label my-2">Users</li>
            <li>
                <a href="{{ route('users.index')}}"><i data-feather="lock" class="align-self-center menu-icon"></i><span>Users</span><span class="menu-arrow"></span></a>

            </li>
            <li>
                <a href="{{ route('roles.index') }}"><i data-feather="lock" class="align-self-center menu-icon"></i><span>Roles</span><span class="menu-arrow"></span></a>
            </li>
            @endcan
            @can('manage_roles')
            <hr class="hr-dashed hr-menu">
            <li class="menu-label my-2">Settings</li>
            <li>
                <a href="{{ route('filemanager.index') }}"><i data-feather="lock" class="align-self-center menu-icon"></i><span>File Manager</span><span class="menu-arrow"></span></a>
            </li>
            @endcan
        </ul>
    </div>
</div>
<!-- end left-sidenav-->
