<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div class="logo-wrapper">
        <a href="{{ route('admin.dashboard') }}">
            <img class="img-fluid" src="{{ asset('frontend/assets/images/logo/white-logo-mobile.png') }}" alt="">
        </a>
        <div class="back-btn">
            <i class="fa fa-angle-left"></i>
        </div>
        <div class="toggle-sidebar">
            <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
        </div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('admin.dashboard') }}">
            <img class="img-fluid" src="{{ asset('frontend/assets/images/logo/white-logo-mobile.png') }}" alt="">
        </a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow">
            <i data-feather="arrow-left"></i>
        </div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn">
                    <a href="{{ route('admin.dashboard') }}">
                        <img class="img-fluid" src="{{ asset('frontend/assets/images/logo/lwhite-logo-mobile.png') }}" alt="">
                    </a>
                    <div class="mobile-back text-end">
                        <span>Back </span>
                        <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                    </div>
                </li>

                {{-- Dashboard --}}
                <li class="sidebar-list">
                    <a class="sidebar-link  {{
                        (Route::currentRouteName() === 'admin.dashboard')
                        || (Route::currentRouteName() === 'banner.index') || (Route::currentRouteName() === 'banner.create') || (Route::currentRouteName() === 'banner.edit')
                        || (Route::currentRouteName() === 'statistics.index') || (Route::currentRouteName() === 'statistics.create') || (Route::currentRouteName() === 'statistics.edit')
                        || (Route::currentRouteName() === 'construction-solutions.index') || (Route::currentRouteName() === 'construction-solutions.create') || (Route::currentRouteName() === 'construction-solutions.edit')
                        || (Route::currentRouteName() === 'teams.index') || (Route::currentRouteName() === 'teams.create') || (Route::currentRouteName() === 'teams.edit')
                        || (Route::currentRouteName() === 'clients.index') || (Route::currentRouteName() === 'clients.create') || (Route::currentRouteName() === 'clients.edit')
                        || (Route::currentRouteName() === 'associates.index') || (Route::currentRouteName() === 'associates.create') || (Route::currentRouteName() === 'associates.edit')
                        ? 'active' : '' }} sidebar-title" href="javascript:void(0)">

                        <b>
                            <span>
                                <i class="icon-home"></i>
                                Home
                            </span>
                        </b>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('banner.index') }}" class="{{ (Route::currentRouteName() === 'banner.index') || (Route::currentRouteName() === 'banner.create') || (Route::currentRouteName() === 'banner.edit') ? 'active' : '' }}">Banner</a>
                        </li>
                        <li>
                            <a href="{{ route('statistics.index') }}" class="{{ (Route::currentRouteName() === 'statistics.index') || (Route::currentRouteName() === 'statistics.create') || (Route::currentRouteName() === 'statistics.edit') ? 'active' : '' }}">Statistics</a>
                        </li>
                        <li>
                            <a href="{{ route('construction-solutions.index') }}" class="{{ (Route::currentRouteName() === 'construction-solutions.index') || (Route::currentRouteName() === 'construction-solutions.create') || (Route::currentRouteName() === 'construction-solutions.edit') ? 'active' : '' }}">Construction Solutions</a>
                        </li>
                        <li>
                            <a href="{{ route('teams.index') }}" class="{{ (Route::currentRouteName() === 'teams.index') || (Route::currentRouteName() === 'teams.create') || (Route::currentRouteName() === 'teams.edit') ? 'active' : '' }}">Teams</a>
                        </li>
                        <li>
                            <a href="{{ route('clients.index') }}" class="{{ (Route::currentRouteName() === 'clients.index') || (Route::currentRouteName() === 'clients.create') || (Route::currentRouteName() === 'clients.edit') ? 'active' : '' }}">Clients</a>
                        </li>
                        <li>
                            <a href="{{ route('associates.index') }}" class="{{ (Route::currentRouteName() === 'associates.index') || (Route::currentRouteName() === 'associates.create') || (Route::currentRouteName() === 'associates.edit') ? 'active' : '' }}">Associates</a>
                        </li>
                    </ul>
                </li>

                {{-- About J4C --}}
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                        <b>
                            <span>
                                <i class="icon-info"></i>
                                About Us
                            </span>
                        </b>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="#" class="">About J4C</a>
                        </li>
                        <li>
                            <a href="#" class="">Our Mission</a>
                        </li>
                        <li>
                            <a href="#" class="">Our Vision</a>
                        </li>
                        <li>
                            <a href="#" class="">Certifications</a>
                        </li>
                        <li>
                            <a href="#" class="">Awards</a>
                        </li>
                        <li>
                      <a href="#" class="">Our USP</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </div>
    </nav>
</div>
