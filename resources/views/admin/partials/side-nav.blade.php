<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('admin.index') }}" class="b-brand text-primary">
                @php
                    $settings = generalSettings()
                @endphp
                @if($settings->logo)
                    <img src="{{ asset('storage/' . $settings->logo) }}" class="logo-lg" alt="Logo image"
                        style="max-height: 40px; width: auto; max-width: 100%;">
                @else
                    <img src="https://codedthemes.com/demos/admin-templates/gradient-able/bootstrap/default/assets/images/logo-dark.svg"
                        alt="logo image" class="logo-lg">
                @endif
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.index') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-gauge"></i></span><span class="pc-mtext">Dashboard</span></a>
                </li>

                @if(auth()->check() && auth()->user()->hasAnyPermission(['create-event', 'edit-event', 'show-event', 'delete-event',]))
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('events') }}" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-calendar"></i></span><span class="pc-mtext">Events</span></a>
                    </li>
                @endif

                @if(auth()->check() && auth()->user()->hasAnyPermission(['create-event-schedule', 'edit-event-schedule', 'show-event-schedule', 'delete-event-schedule',]))
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('event.schedule') }}" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-clock"></i></span><span class="pc-mtext">Event Schedules</span></a>
                    </li>
                @endif

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('reviews') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-chat"></i></span><span class="pc-mtext">Reveiws</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('contact.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-phone"></i></span><span class="pc-mtext">Contacts</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('team.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-users"></i></span><span class="pc-mtext">Team Members</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('register.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-users"></i></span><span class="pc-mtext">Student Registraiton</span></a>
                </li>

                @if (auth()->check() && auth()->user()->hasAnyPermission(['update-general-setting', 'update-email-setting', 'cache-clear']))
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-gear"></i></span><span class="pc-mtext">Application Settings</span><span class="pc-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            @if (auth()->check() && auth()->user()->hasPermissionTo('update-general-setting'))
                                <li class="pc-item"><a class="pc-link" href="{{ route('general.setting') }}">General
                                        Settings</a></li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasPermissionTo('update-email-setting'))
                                <li class="pc-item"><a class="pc-link" href="{{ route('email.setting') }}">Email Settings</a>
                                </li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasPermissionTo('cache-clear'))
                                <li class="pc-item"><a class="pc-link" href="{{ route('application.cache.clear') }}">Cache
                                        Clear</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Roles & Permissions Menu -->
                @if (auth()->check() && auth()->user()->hasAnyPermission(['set-userRole', 'show-user', 'delete-user', 'create-role', 'edit-role', 'delete-role']))
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-shield"></i></span><span class="pc-mtext">Roles &
                                Permissions</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            @if (auth()->check() && auth()->user()->hasAnyPermission(['set-userRole', 'show-user', 'delete-user']))
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('admin.users.index') }}">CMS Users</a>
                                </li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasAnyPermission(['create-role', 'edit-role', 'delete-role']))
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('admin.roles.index') }}">Roles</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->check() && auth()->user()->hasAnyPermission(['create-category', 'edit-category', 'show-category', 'delete-category', 'create-product', 'edit-product', 'show-product', 'delete-product']))
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-list"></i></span><span class="pc-mtext">Menus</span><span class="pc-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            @if (auth()->check() && auth()->user()->hasAnyPermission(['create-category', 'edit-category', 'show-category', 'delete-category']))
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('categories.index') }}">Category</a>
                                </li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasAnyPermission(['create-product', 'edit-product', 'show-product', 'delete-product']))
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('products.index') }}">Product</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>