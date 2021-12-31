@extends('accreditation.staff.layouts.app',['page_title'=>'CS Course Allocation | Staff Login'])

@section('css-before')
@endsection

@section('css-after')
@endsection

@section('content')
{{--    <div id="containerbar" class="containerbar authenticate-bg">--}}
        <!-- Start Container -->
        <div class="container mt-0">
{{--            <div class="auth-box login-box mt-0">--}}
            <div class="">
                <!-- Start row -->
                <div class="row align-items-center justify-content-center" >
                    <!-- Start col -->
                    <div class="col-md-6">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form action="{{route('staff.login.post')}}" method="post">
                                        @csrf
                                        <div class="form-head mb-4" style="text-align: center">
                                            <a href="{{route('staff.index')}}" class="logo"><img src="{{asset('assets/images/logo.png')}}" class="img-fluid" alt="logo"></a>
                                        </div>
                                        <h4 class="text-primary  mb-4" style="text-align: center"><i class="fa fa-sign-in"></i> Log in</h4>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username here" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password here" required>
                                        </div>
{{--                                        <div class="form-row mb-3">--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="custom-control custom-checkbox text-left">--}}
{{--                                                    <input type="checkbox" class="custom-control-input" id="rememberme">--}}
{{--                                                    <label class="custom-control-label font-14" for="rememberme">Remember Me</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="forgot-psw">--}}
{{--                                                    <a id="forgot-psw" href="user-forgotpsw.html" class="font-14">Forgot Password?</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                    </form>
{{--                                    <div class="login-or">--}}
{{--                                        <h6 class="text-muted">OR</h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="social-login text-center">--}}
{{--                                        <button type="submit" class="btn btn-primary-rgba font-18"><i class="mdi mdi-facebook mr-2"></i>Facebook</button>--}}
{{--                                        <button type="submit" class="btn btn-danger-rgba font-18"><i class="mdi mdi-google mr-2"></i>Google</button>--}}
{{--                                    </div>--}}
{{--                                    <p class="mb-0 mt-3">Don't have a account? <a href="user-register.html">Sign up</a></p>--}}
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
{{--    </div>--}}
@endsection

@section('scripts-before')
@endsection

@section('scripts-after')
@endsection
