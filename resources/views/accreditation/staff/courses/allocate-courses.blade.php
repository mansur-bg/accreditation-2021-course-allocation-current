@extends('accreditation.staff.layouts.app',['page_title'=>'CS Course Allocation | Allocate Courses'])

@section('css-before')
@endsection

@section('css-after')
    <link href="{{asset('assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- Start row -->
{{--    <div class="row">--}}
{{--        <!-- Start col -->--}}
{{--        <div class="col-md-12 col-lg-12 col-xl-12">--}}
{{--            <div class="text-center mt-3 mb-5">--}}
{{--                <h4>Allocate Courses</h4>--}}
{{--            </div>--}}
            <div class="row">
                <!-- Start col -->
                <div class="col-6 offset-3">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title bg-secondary-gradient alert">Allocate Courses <span class="float-right"> </span></h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('staff.allocate-courses.get-template')}}" method="GET">
                                <div class="float-right mb-3">
                                    <button  class="btn btn-success" ><i class="fad fa-download"></i> Template</button>
                                </div>
                            </form>
                            <form action="{{route('staff.allocate-courses.store')}}" class="dropzone">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                            </form>
                            <div class="text-center m-t-15">
                                <button type="button" class="btn btn-primary"><span class=" font-18"><i class="fad fa-file-excel"></i> Upload File</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>

{{--        </div>--}}
        <!-- End col -->
{{--    </div>--}}
    <!-- End row -->
@endsection

@section('scripts-before')
@endsection

@section('scripts-after')
    <script src="{{asset('assets/plugins/dropzone/dist/dropzone.js')}}"></script>
@endsection
