@extends('accreditation.staff.layouts.app',['page_title'=>'CS Course Allocation | Allocation Letters'])

@section('css-before')
@endsection

@section('css-after')
@endsection

@section('content')
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="text-center mt-n3">
                <h4>Allocation Letters</h4>
            </div>

            <!-- Start col -->
            <div class="col-md-6 offset-md-3">
                <div class="card m-b-30">
                    <div class="card-header">Generate Letters</div>
                    <div class="card-body">
{{--                        <h5 class="card-title">Generate Letters</h5>--}}
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('staff.allocate-letters.generate')}}" class="btn btn-primary btn-block"><i class="fad fa-gears fa-spin"></i> Generate Letters / Session</a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{route('staff.individual-allocate-letters.generate')}}" class="btn btn-success btn-block"><i class="fad fa-gear fa-spin"></i> Generate Letters / Staff / Session</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->

        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
@endsection

@section('scripts-before')
@endsection

@section('scripts-after')
@endsection
