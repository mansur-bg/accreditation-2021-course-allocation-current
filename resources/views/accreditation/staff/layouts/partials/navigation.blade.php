<!-- Start Navigationbar -->
<div class="navigationbar">
    @auth('staff')
        <div style="text-align: center" class="vertical-menu">
            <img src="{{asset('assets/photos/staff/'.session('staff_photo'))}}" class="img img-fluid rounded-circle" style="max-height: 100px;" alt="staff-photo"><br>
{{--            <span>{{session('staff_name')}}</span>--}}

        </div>
    @endauth
    <ul class="vertical-menu">
        @guest
            <li>
                <a href="{{route('staff.index')}}">
                    <i class="fa fa-home font-25"></i><span> Staff Index</span>
                </a>
            </li>
            <li>
                <a href="{{route('staff.login')}}">
                    <i class="fa fa-sign-in  font-25"></i><span> Staff Login</span>
                </a>
            </li>
        @endguest
        @auth('staff')
{{--                @if(Auth::guard('staff')->user()->isAdmin())--}}
{{--                    <li class="text-muted">Admin</li>--}}
{{--                @endif--}}
                <li>
                    <a href="{{route('staff.dashboard')}}">
                        <i class="fad fa-dashboard font-25"></i><span> Dashboard</span>
                    </a>
                </li>

                @if(Auth::guard('staff')->user()->isAdmin())
                    <li>
                        <a href="{{route('staff.staff.index')}}">
                            <i class="fad fa-users font-25"></i><span> Staff</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('staff.courses.index')}}">
                            <i class="fad fa-books font-25"></i><span> Courses</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('staff.allocate-courses.index')}}">
                            <i class="fad fa-atom-alt font-25"></i><span> Allocate Courses</span>
                        </a>
                    </li>
                @endif

                <li>
{{--                    <a href="{{route('staff.logout')}}">--}}

{{--                    <a class="d-flex menu-a inline" href="{{route('staff.logout')}}" style="padding: 5px">--}}
{{--                        <span style="font-size: 20px" class="far fa-sign-out-alt mb-nav-icon"></span>--}}
{{--                        <span class="menu-title text-truncate" data-i18n="Logout"> Logout--}}
{{--            </span>--}}
{{--                    </a>--}}

                    <a href="{{ route('staff.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fad fa-sign-out font-25"></i><span> Logout</span>
                    </a>

{{--                    <a href="{{route('staff.logout')}}">--}}
                        <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

{{--                    </a>--}}
                </li>
        @endauth
    </ul>
</div>
<!-- End Navigationbar -->
