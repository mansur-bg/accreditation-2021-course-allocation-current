
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="#" class="mobile-logo"><img src="{{asset('assets/images/logo.svg')}}" class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="font-weight-bold">
                                CS BUK Course Allocation Management
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <img src="{{asset('assets/images/svg-icon/horizontal.svg')}}" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                    <img src="{{asset('assets/images/svg-icon/verticle.svg')}}" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                </a>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <img src="{{asset('assets/images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                    <img src="{{asset('assets/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Topbar -->
    <div class="topbar">
        <!-- Start row -->
        <div class="row align-items-center">
            <!-- Start col -->
            <div class="col-md-12 align-self-center">
                <div class="togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <img src="{{asset('assets/images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                    <img src="{{asset('assets/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                                </a>
                            </div>
                        </li>
{{--                        <ul class="list-inline mb-0">--}}
                            <li class="list-inline-item">
                                                        <div class="font-weight-bold">
                                                            CS BUK Course Allocation Management
                                                        </div>
                                                    </li>
{{--                        </ul>--}}
                    </ul>
                </div>
                @auth('staff')
                <div class="infobar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="profilebar">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{asset('assets/photos/staff/'.session('staff_photo'))}}" class="img-fluid" alt="profile">
                                        <span class="feather icon-chevron-down live-icon"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                        <div class="dropdown-item">
                                            <div class="profilename">
                                                <h5>{{session('staff_name')}}</h5>
                                            </div>
                                        </div>
                                        <div class="userbox">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media dropdown-item">
                                                    <a href="{{ route('staff.logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form1').submit();"  class="profile-icon"><img src="{{asset('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout" >
{{--                                                        <i class="fa fa-sign-out font-25"></i>--}}
                                                        <span>Logout</span>
                                                    </a>

                                                    {{--                    <a href="{{route('staff.logout')}}">--}}
                                                    <form id="logout-form1" action="{{ route('staff.logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>

{{--                                                    <a href="{{route('staff.logout')}}" class="profile-icon"><img src="{{asset('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout">Logout</a>--}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                    @endauth
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Topbar -->
