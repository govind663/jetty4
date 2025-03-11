<div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none ">
    <div class="mobile-menu">
        <nav class="header-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="Javascript:void(0)">About J4C<i class="fa fa-chevron-down"></i></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('frontend.about-us') }}">About J4C</a></li>
                        <li><a href="{{ route('frontend.mission-vision') }}">Mission & Vision</a></li>
                        <li><a href="{{ route('frontend.awards-certifications') }}">Awards & Certifications</a></li>
                        <li><a href="{{ route('frontend.our-usp') }}">Our USP</a></li>
                    </ul>
                </li>
                @php
                    use App\Models\ProjectType;

                    $project_types = ProjectType::orderBy("id","asc")->whereNull('deleted_at')->get();
                @endphp
                <li class="menu-item-has-children">
                    <a href="Javascript:void(0)">Projects<i class="fa fa-chevron-down"></i></a>
                    <ul class="sub-menu">
                        @foreach($project_types as $project_type)
                            <li><a href="{{ route('frontend.projects', ['slug' => $project_type->slug]) }}">{{ $project_type->project_type }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('frontend.sustainability') }}">Sustainability</a></li>
                <li><a href="{{ route('frontend.careers') }}">Careers</a></li>
                <li><a href="{{ route('frontend.media-events') }}">Media & Events</a></li>
                <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</div>
