<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header d-flex align-items-center">
            <li class="navbar-brand" href="javascript:void">
                <img src="{{ asset('images/logo190x50px.png') }}" class="navbar-brand-img" alt="...">
            </li>
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    @role('Super Admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('a/dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboards</span>
                            </a>
                        </li>
                    @endrole
                    @hasanyrole('Super Admin|Author')
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('a/events*', 'a/registrations*') ? ' active' : '' }}" href="#event_management" data-toggle="collapse" role="button" aria-expanded="{{ request()->is('a/events*', 'a/registrations*') ? 'true' : 'false' }}" aria-controls="event_management">
                                <i class="ni ni-single-copy-04 text-pink"></i>
                                <span class="nav-link-text">Event Management</span>
                            </a>
                            <div class="collapse{{ request()->is('a/events*', 'a/registrations*') ? ' show' : '' }}" id="event_management">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('events.index') }}" class="nav-link{{ request()->is('a/events*') ? ' active' : '' }}">
                                            <span class="sidenav-mini-icon"> P </span>
                                            <span class="sidenav-normal"> Events </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('registrations.index') }}" class="nav-link{{ request()->is('a/registrations*') ? ' active' : '' }}">
                                            <span class="sidenav-mini-icon"> RD </span>
                                            <span class="sidenav-normal"> Registration Data </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('a/gallery*') ? ' active' : '' }}" href="{{ url('/a/gallery') }}">
                                <i class="ni ni-album-2 text-blue"></i>
                                <span class="nav-link-text">Gallery</span>
                            </a>
                        </li>
                    @endhasanyrole
                    @role('Super Admin')
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('a/users*', 'a/roles*') ? ' active' : '' }}" href="#user_management" data-toggle="collapse" role="button" aria-expanded="{{ request()->is('a/users*', 'a/roles*') ? 'true' : 'false' }}" aria-controls="user_management">
                                <i class="ni ni-settings "></i>
                                <span class="nav-link-text">Users Management</span>
                            </a>
                            <div class="collapse{{ request()->is('a/users*', 'a/roles*') ? ' show' : '' }}" id="user_management">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> U </span>
                                            <span class="sidenav-normal"> Users </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> R </span>
                                            <span class="sidenav-normal"> Roles </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole
                    @hasanyrole('Participants|Super Admin|Author')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('participants/re-registrations*') ? ' active' : '' }}" href="{{ route('re-registrations.index') }}">
                                <i class="ni ni-circle-08 text-warning"></i>
                                <span class="nav-link-text">Re-Registration</span>
                            </a>
                        </li>
                    @endhasanyrole
                </ul>
            </div>
        </div>
    </div>
</nav>
