<!-- Start Navigationbar -->
<div class="navigationbar">
    <ul class="vertical-menu">
        @guest
            <li>
                <a href="{{route('index')}}">
                    <i class="fa fa-home font-25"></i><span> Index</span>
                </a>
            </li>
            <li>
                <a href="{{route('login')}}">
                    <i class="fa fa-sign-in  font-25"></i><span> Login</span>
                </a>
            </li>
        @endguest
    </ul>
</div>
<!-- End Navigationbar -->
