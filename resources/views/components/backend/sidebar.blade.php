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
                        <img class="img-fluid" src="{{ asset('frontend/assets/images/logo/white-logo-mobile.png') }}" alt="">
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
                        || (Route::currentRouteName() === 'breadcrumb.index') || (Route::currentRouteName() === 'breadcrumb.create') || (Route::currentRouteName() === 'breadcrumb.edit')
                        || (Route::currentRouteName() === 'statistics.index') || (Route::currentRouteName() === 'statistics.create') || (Route::currentRouteName() === 'statistics.edit')
                        || (Route::currentRouteName() === 'construction-solutions.index') || (Route::currentRouteName() === 'construction-solutions.create') || (Route::currentRouteName() === 'construction-solutions.edit')
                        || (Route::currentRouteName() === 'teams.index') || (Route::currentRouteName() === 'teams.create') || (Route::currentRouteName() === 'teams.edit')
                        || (Route::currentRouteName() === 'clients.index') || (Route::currentRouteName() === 'clients.create') || (Route::currentRouteName() === 'clients.edit')
                        || (Route::currentRouteName() === 'associates.index') || (Route::currentRouteName() === 'associates.create') || (Route::currentRouteName() === 'associates.edit')
                        ? 'active' : '' }} sidebar-title" href="javascript:void(0)">

                        <span>
                            <i class="icon-home"></i>
                            Home
                        </span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('banner.index') }}" class="{{ (Route::currentRouteName() === 'banner.index') || (Route::currentRouteName() === 'banner.create') || (Route::currentRouteName() === 'banner.edit') ? 'active' : '' }}">Banner</a>
                        </li>
                        <li>
                            <a href="{{ route('breadcrumb.index') }}" class="{{ (Route::currentRouteName() === 'breadcrumb.index') || (Route::currentRouteName() === 'breadcrumb.create') || (Route::currentRouteName() === 'breadcrumb.edit') ? 'active' : '' }}">Breadcrumb</a>
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
                    <a class="sidebar-link sidebar-title
                    {{ (Route::currentRouteName() === 'about-j4c.index') || (Route::currentRouteName() === 'about-j4c.create') || (Route::currentRouteName() === 'about-j4c.edit')
                       || (Route::currentRouteName() === 'who-we-are.index') || (Route::currentRouteName() === 'who-we-are.create') || (Route::currentRouteName() === 'who-we-are.edit')
                       || (Route::currentRouteName() === 'our-mission.index') || (Route::currentRouteName() === 'our-mission.create') || (Route::currentRouteName() === 'our-mission.edit')
                       || (Route::currentRouteName() === 'our-vision.index') || (Route::currentRouteName() === 'our-vision.create') || (Route::currentRouteName() === 'our-vision.edit')
                       || (Route::currentRouteName() === 'certification.index') || (Route::currentRouteName() === 'certification.create') || (Route::currentRouteName() === 'certification.edit')
                       || (Route::currentRouteName() === 'award.index') || (Route::currentRouteName() === 'award.create') || (Route::currentRouteName() === 'award.edit')
                        ? 'active' : '' }}"
                        href="javascript:void(0)">
                        <span>
                            <i class="icon-info"></i>
                            About Us
                        </span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('about-j4c.index') }}" class="{{ (Route::currentRouteName() === 'about-j4c.index') || (Route::currentRouteName() === 'about-j4c.create') || (Route::currentRouteName() === 'about-j4c.edit') ? 'active' : '' }}">About J4C</a>
                        </li>
                        <li>
                            <a href="{{ route('who-we-are.index') }}" class="{{ (Route::currentRouteName() === 'who-we-are.index') || (Route::currentRouteName() === 'who-we-are.create') || (Route::currentRouteName() === 'who-we-are.edit') ? 'active' : '' }}">Who We Are</a>
                        </li>
                        <li>
                            <a href="{{ route('our-mission.index') }}" class="{{ (Route::currentRouteName() === 'our-mission.index') || (Route::currentRouteName() === 'our-mission.create') || (Route::currentRouteName() === 'our-mission.edit') ? 'active' : '' }}">Our Mission</a>
                        </li>
                        <li>
                            <a href="{{ route('our-vision.index') }}" class="{{ (Route::currentRouteName() === 'our-vision.index') || (Route::currentRouteName() === 'our-vision.create') || (Route::currentRouteName() === 'our-vision.edit') ? 'active' : '' }}">Our Vision</a>
                        </li>
                        <li>
                            <a href="{{ route('certification.index') }}" class="{{ (Route::currentRouteName() === 'certification.index') || (Route::currentRouteName() === 'certification.create') || (Route::currentRouteName() === 'certification.edit') ? 'active' : '' }}">Certification</a>
                        </li>
                        <li>
                            <a href="{{ route('award.index') }}" class="{{ (Route::currentRouteName() === 'award.index') || (Route::currentRouteName() === 'award.create') || (Route::currentRouteName() === 'award.edit') ? 'active' : '' }}">Award</a>
                        </li>
                    </ul>
                </li>

                {{-- Our USP --}}
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title
                    {{ (Route::currentRouteName() === 'our-usp.index') || (Route::currentRouteName() === 'our-usp.create') || (Route::currentRouteName() === 'our-usp.edit')
                        || (Route::currentRouteName() === 'our-usp.index') || (Route::currentRouteName() === 'our-usp.create') || (Route::currentRouteName() === 'our-usp.edit')
                        || (Route::currentRouteName() === 'unique-approach.index') || (Route::currentRouteName() === 'unique-approach.create') || (Route::currentRouteName() === 'unique-approach.edit')
                        || (Route::currentRouteName() === 'our-management.index') || (Route::currentRouteName() === 'our-management.create') || (Route::currentRouteName() === 'our-management.edit')
                        ? 'active' : '' }}" href="javascript:void(0)">
                        <span>
                            <i class="icon-layout"></i>
                            Our USP
                        </span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('our-usp.index') }}" class="{{ (Route::currentRouteName() === 'our-usp.index') || (Route::currentRouteName() === 'our-usp.create') || (Route::currentRouteName() === 'our-usp.edit') ? 'active' : ''  }}">About J4C USP</a>
                        </li>
                        <li>
                            <a href="{{ route('unique-approach.index') }}" class="{{ (Route::currentRouteName() === 'unique-approach.index') || (Route::currentRouteName() === 'unique-approach.create') || (Route::currentRouteName() === 'unique-approach.edit') ? 'active' : ''  }}">Unique Approach</a>
                        </li>
                        <li>
                            <a href="{{ route('our-management.index') }}" class="{{ (Route::currentRouteName() === 'our-management.index') || (Route::currentRouteName() === 'our-management.create') || (Route::currentRouteName() === 'our-management.edit') ? 'active' : ''  }}">Our Management</a>
                        </li>
                    </ul>
                </li>

                {{-- Projects --}}
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ (Route::currentRouteName() === 'project-type.index') || (Route::currentRouteName() === 'project-type.create') || (Route::currentRouteName() === 'project-type.edit')
                        || (Route::currentRouteName() === 'project-status-details.index') || (Route::currentRouteName() === 'project-status-details.create') || (Route::currentRouteName() === 'project-status-details.edit')
                        || (Route::currentRouteName() === 'projects.index') || (Route::currentRouteName() === 'projects.create') || (Route::currentRouteName() === 'projects.edit')
                        || (Route::currentRouteName() === 'project-details.index') || (Route::currentRouteName() === 'project-details.create') || (Route::currentRouteName() === 'project-details.edit')
                        ? 'active' : '' }}" href="javascript:void(0)">
                        <span>
                            <i class="icon-package"></i>
                            Projects
                        </span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('project-type.index') }}" class="{{ (Route::currentRouteName() === 'project-type.index') || (Route::currentRouteName() === 'project-type.create') || (Route::currentRouteName() === 'project-type.edit') ? 'active' : '' }}">Project Type</a>
                        </li>
                        <li>
                            <a href="{{ route('project-status-details.index') }}" class="{{ (Route::currentRouteName() === 'project-status-details.index') || (Route::currentRouteName() === 'project-status-details.create') || (Route::currentRouteName() === 'project-status-details.edit') ? 'active' : '' }}">Project Status Details</a>
                        <li>
                            <a href="{{ route('projects.index') }}" class="{{ (Route::currentRouteName() === 'projects.index') || (Route::currentRouteName() === 'projects.create') || (Route::currentRouteName() === 'projects.edit') ? 'active' : '' }}">Project</a>
                        </li>
                        <li>
                            <a href="{{ route('project-details.index') }}" class="{{ (Route::currentRouteName() === 'project-details.index') || (Route::currentRouteName() === 'project-details.create') || (Route::currentRouteName() === 'project-detail.edit') ? 'active' : '' }}">Project Details</a>
                        </li>
                    </ul>
                </li>

                {{-- Sustainability --}}
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{
                        (Route::currentRouteName() === 'about-sustainability.index') || (Route::currentRouteName() === 'about-sustainability.create') || (Route::currentRouteName() === 'about-sustainability.edit')
                        || (Route::currentRouteName() === 'safety-commitment.index') || (Route::currentRouteName() === 'safety-commitment.create') || (Route::currentRouteName() === 'safety-commitment.edit')
                        || (Route::currentRouteName() === 'safety-initiatives.index') || (Route::currentRouteName() === 'safety-initiatives.create') || (Route::currentRouteName() === 'safety-initiatives.edit')
                        ? 'active' : '' }}
                        " href="javascript:void(0)">
                        <span>
                            <i class="icon-basketball"></i>
                            Sustainability
                        </span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('about-sustainability.index') }}" class="{{ (Route::currentRouteName() === 'about-sustainability.index') || (Route::currentRouteName() === 'about-sustainability.create') || (Route::currentRouteName() === 'about-sustainability.edit') ? 'active' : '' }}">About Sustainability</a>
                        </li>
                        <li>
                            <a href="{{ route('safety-commitment.index') }}" class="{{ (Route::currentRouteName() === 'safety-commitment.index') || (Route::currentRouteName() === 'safety-commitment.create') || (Route::currentRouteName() === 'safety-commitment.edit') ? 'active' : '' }}">Safety Commitment</a>
                        </li>
                        <li>
                            <a href="{{ route('safety-initiatives.index') }}" class="{{ (Route::currentRouteName() === 'safety-initiatives.index') || (Route::currentRouteName() === 'safety-initiatives.create') || (Route::currentRouteName() === 'safety-initiatives.edit') ? 'active' : '' }}">Safety Initiatives</a>
                        </li>
                    </ul>
                </li>

                {{-- Careers --}}
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ (Route::currentRouteName() === 'about-career.index') || (Route::currentRouteName() === 'about-career.create') || (Route::currentRouteName() === 'about-career.edit')
                        || (Route::currentRouteName() === 'current-opening.index') || (Route::currentRouteName() === 'current-opening.create') || (Route::currentRouteName() === 'current-opening.edit')
                        || (Route::currentRouteName() === 'carrier-details.index') || (Route::currentRouteName() === 'carrier-details.create') || (Route::currentRouteName() === 'carrier-details.edit')
                        ? 'active' : '' }}" href="javascript:void(0)">
                        <span>
                            <i class="icon-bag"></i>
                            Careers
                        </span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('about-career.index') }}" class="{{ (Route::currentRouteName() === 'about-career.index') || (Route::currentRouteName() === 'about-career.create') || (Route::currentRouteName() === 'about-career.edit') ? 'active' : ''  }}">About Career</a>
                        </li>
                        <li>
                            <a href="{{ route('current-opening.index') }}" class="{{ (Route::currentRouteName() === 'current-opening.index') || (Route::currentRouteName() === 'current-opening.create') || (Route::currentRouteName() === 'current-opening.edit') ? 'active' : ''  }}">Current Openings</a>
                        </li>
                        <li>
                            <a href="{{ route('carrier-details.index') }}" class="{{ (Route::currentRouteName() === 'carrier-details.index') || (Route::currentRouteName() === 'carrier-details.create') || (Route::currentRouteName() === 'carrier-details.edit') ? 'active' : ''  }}">Career Details</a>
                        </li>
                    </ul>
                </li>

                {{-- Media & Events --}}
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ (Route::currentRouteName() === 'media-events.index') || (Route::currentRouteName() === 'media-events.create') || (Route::currentRouteName() === 'media-events.edit')
                        || (Route::currentRouteName() === 'media-details.index') || (Route::currentRouteName() === 'media-details.create') || (Route::currentRouteName() === 'media-details.edit')
                        ? 'active' : '' }}" href="javascript:void(0)">
                        <span>
                            <i class="icon-info"></i>
                            Media & Events
                        </span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('media-events.index') }}" class="{{ (Route::currentRouteName() === 'media-events.index') || (Route::currentRouteName() === 'media-events.create') || (Route::currentRouteName() === 'media-events.edit') ? 'active' : '' }}">Media & Events</a>
                        </li>
                        <li>
                            <a href="{{ route('media-details.index') }}" class="{{ (Route::currentRouteName() === 'media-details.index') || (Route::currentRouteName() === 'media-details.create') || (Route::currentRouteName() === 'media-details.edit') ? 'active' : '' }}">Media & Events Details</a>
                        </li>
                    </ul>
                </li>

                {{-- Contact US --}}
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ (Route::currentRouteName() === 'contact-details.index') || (Route::currentRouteName() === 'contact-details.create') || (Route::currentRouteName() === 'contact-details.edit') ? 'active' : '' }}" href="javascript:void(0)">
                        <span>
                            <i class="icon-mobile"></i>
                            Contact US
                        </span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('contact-details.index') }}" class="{{ (Route::currentRouteName() === 'contact-details.index') || (Route::currentRouteName() === 'contact-details.create') || (Route::currentRouteName() === 'contact-details.edit') ? 'active' : ''  }}">Contact Details</a>
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
