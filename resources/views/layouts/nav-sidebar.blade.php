<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="/">
                <span class="smini-visible">
                    L<span class="opacity-75">G</span>
                </span>
                <span class="smini-hidden">
                    Lacek<span class="opacity-75">Group</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Lacek.layout('sidebar_style_toggle');Lacek.layout('header_style_toggle');">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </button>
                <!-- END Toggle Sidebar Style -->

                <!-- Dark Mode -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Lacek.layout('dark_mode_toggle');">
                    <i class="far fa-moon" id="dark-mode-toggler"></i>
                </button>
                <!-- END Dark Mode -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ routeIs('dashboard.index', 'active') }}" href="{{ route('dashboard.index') }}">
                        <i class="nav-main-link-icon fa fa-location-arrow"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">5</span>
                    </a>
                </li>
                <li class="nav-main-heading">Admin</li>
                <li class="nav-main-item {{ routeIs('dashboard.users.*') || routeIs('dashboard.roles.*') || routeIs('dashboard.permissions.*') ? ' open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon fa fa-user"></i>
                        <span class="nav-main-link-name">Access</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ routeIs('dashboard.users.index', 'active') }}" href="{{ route('dashboard.users.index') }}">
                                <span class="nav-main-link-name">Users</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ routeIs('dashboard.roles.index', 'active') }}" href="{{ route('dashboard.roles.index') }}">
                                <span class="nav-main-link-name">Roles</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ routeIs('dashboard.permissions.index', 'active') }}" href="{{ route('dashboard.permissions.index') }}">
                                <span class="nav-main-link-name">Permissions</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-heading">More</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="/">
                        <i class="nav-main-link-icon fa fa-globe"></i>
                        <span class="nav-main-link-name">Landing</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
