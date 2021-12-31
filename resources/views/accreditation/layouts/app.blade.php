<!DOCTYPE html>
<html lang="en">
@include('accreditation.layouts.partials.head')
<body class="vertical-layout">

<!-- Start Containerbar -->
<div id="containerbar">
    <!-- Start Leftbar -->
    <div class="leftbar">
        <!-- Start Sidebar -->
        <div class="sidebar">
            <!-- Start Logobar -->
            <div class="logobar">
{{--                <a href="#" class="logo logo-large"><img src="{{asset('assets/images/logo.svg')}}" class="img-fluid" alt="logo"></a>--}}
                <a href="#" class="logo logo-large"><img src="{{asset('assets/images/logo.png')}}" class="img-fluid" alt="logo"></a>
{{--                <a href="#" class="logo logo-small"><img src="{{asset('assets/images/small_logo.svg')}}" class="img-fluid" alt="logo"></a>--}}
                <a href="#" class="logo logo-small"><img src="{{asset('assets/images/small_logo.png')}}" class="img-fluid" alt="logo"></a>
            </div>
            <!-- End Logobar -->
@include('accreditation.layouts.partials.navigation')

        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Leftbar -->
    <!-- Start Rightbar -->
    <div class="rightbar">
@include('accreditation.layouts.partials.top-bar')

        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">{{$page_title}}</h4>
                    {{--                    <div class="breadcrumb-list">--}}
                    {{--                        <ol class="breadcrumb">--}}
                    {{--                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Pages</a></li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Basic</a></li>--}}
                    {{--                            <li class="breadcrumb-item active" aria-current="page">Starter</li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
                <div class="col-md-4 col-lg-4">
                    {{--                    <div class="widgetbar">--}}
                    {{--                        <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- End Breadcrumbbar -->
        <!-- Start Contentbar -->
        <div class="contentbar">
{{--            <!-- Start row -->--}}
{{--            <div class="row">--}}
{{--                <!-- Start col -->--}}
{{--                <div class="col-md-12 col-lg-12 col-xl-12">--}}
{{--                    <div class="text-center mt-3 mb-5">--}}
{{--                        <h4>Page Title</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End col -->--}}
{{--            </div>--}}
{{--            <!-- End row -->--}}
            @yield('content')
        </div>
        <!-- End Contentbar -->

        @include('accreditation.layouts.partials.footer')
    </div>
    <!-- End Rightbar -->
</div>
<!-- End Containerbar -->
@yield('scripts-before')
<!-- Start js -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/vertical-menu.js')}}"></script>
<!-- Switchery js -->
<script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>
<!-- Core js -->
<script src="{{asset('assets/js/core.js')}}"></script>
<!-- End js -->

@yield('scripts-after')
</body>
</html>
