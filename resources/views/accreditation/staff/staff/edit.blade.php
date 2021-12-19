@extends('accreditation.staff.layouts.app',['page_title'=>'CS Course Allocation | '.$staff->staff_name])

@section('css-before')
@endsection

@section('css-after')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dropify-0.2.2/css/dropify.css')}}">
@endsection


{{--<select class="form-select" id="country_id" name="country_id">--}}
{{--    <option value="">Select Country</option>--}}
{{--    @foreach($countries as $country)--}}
{{--        @if($profile->country_id == null)--}}
{{--            @if (old('country_id') == $country->id)--}}
{{--                <option value="{{ $country->id }}" selected="selected">{{ $country->country }}</option>--}}
{{--            @else--}}
{{--                <option value="{{$country->id  }}">{{$country->country }}</option>--}}
{{--            @endif--}}
{{--        @else--}}
{{--            @if (old('country_id') == $profile->country_id)--}}
{{--                <option value="{{ $country->id }}" selected="selected">{{ $country->country }}</option>--}}
{{--            @elseif($profile->country_id == $country->id)--}}
{{--                <option value="{{ $country->id }}" selected="selected">{{ $country->country }}</option>--}}
{{--            @else--}}
{{--                <option value="{{$country->id  }}">{{$country->country }}</option>--}}
{{--            @endif--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--</select>--}}

@section('content')
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-12 mb-1 mt-0" style="text-align: left">
{{--                <a class="btn btn btn-primary" href="{{route('staff.staff.index')}}"><i class="far fa-arrow-alt-left"></i> Back</a>--}}
{{--                <a class="btn btn btn-primary font-16" href="{{url()->previous()}}"><i class="far fa-arrow-alt-left"></i> Back</a>--}}
            <div class="col-12 mb-1 mt-0" style="text-align: left">
                <a class="btn btn btn-primary" href="{{URL::signedRoute('staff.staff.show',['staff'=>$staff->id])}}"><i class="far fa-arrow-alt-left"></i> View {{$staff->staff_number}}</a>
            </div>
        </div>
        <div class="col-12">
            <!-- Start col -->
            <div class="col-md-12">
                <div class="card m-b-30">
                    <div class="row no-gutters">
                        <div class="col-md-4">
{{--                            <img src="{{asset('assets/photos/staff/'.$staff->photo)}}" style="height: 400px; width: 100%" class="card-img" alt="Card image">--}}

                            <form action="{{ route('staff.staff.photo', ['staff'=>$staff->id]) }}" method="POST" novalidate enctype="multipart/form-data" id="frm" name="frm">
                                @csrf
                                <input type="file" id="photo" name="photo" class="dropify"  data-plugins="dropify" data-default-file="{{asset('assets/photos/staff/'.$staff->photo)}}"  data-height="400" data-show-remove="false" data-show-loader="false" data-allowed-file-extensions="png jpg jpeg" />
{{--                                <input hidden value="{{$staff->id}}" name="staff_id">--}}
{{--                                <input hidden value="{{$staff->initials}}" name="file_name">--}}
                                <button class="btn btn-primary w-50 mt-1" tabindex="5"><i class="fa fa-user-pen"></i> Update Photo</button>
                                {{--                                                @endcanany--}}
                            </form>

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title font-18">{{$staff->staff_name}}</h5>
                                <form method="post" action="{{URL::signedRoute('staff.staff.update',['staff'=>$staff->id])}}">
                                    @method('patch')
                                    @csrf
                                    @foreach($controls as $control)
                                        <div class="form-group row">
                                            <label for="{{$control['name']}}" class="col-sm-4 col-form-label text-right my-n2">{{$control['label']}}</label>
                                            <div class="col-sm-8">
                                            @if($control['control'] == 'text')
                                            <input type="text" class="form-control  my-n2" id="{{$control['name']}}" name="{{$control['name']}}" aria-describedby="{{$control['name']}}" value="{{old($control['name']) ?? $control['value']}}">
                                            @elseif($control['control'] == 'select')
                                                <select class="form-control  my-n2" id="{{$control['name']}}" name="{{$control['name']}}">
                                                    <option value="">Select {{$control['label']}}</option>
                                                    @foreach($control['options'] as $option)
{{--                                                        @if($option == $control['value'])--}}
{{--                                                            <option selected="selected" >{{$option}}</option>--}}
{{--                                                        @else--}}
{{--                                                            <option>{{$option}}</option>--}}
{{--                                                        @endif--}}
                                                        @if($control['value'] == null)
                                                            @if (old($control['name']) == $option)
                                                                <option value="{{$option}}" selected="selected">{{ $option }}</option>
                                                            @else
                                                                <option value="{{$option}}">{{ $option }}</option>
                                                            @endif
                                                        @else
                                                            @if (old($control['name']) == $option)
                                                                <option value="{{$option}}" selected="selected">{{ $option }}</option>
                                                            @elseif ($control['value'] == $option)
                                                                <option value="{{$option}}" selected="selected">{{ $option }}</option>
                                                            @else
                                                                <option value="{{$option}}">{{ $option }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @endif
                                            </div>
                                        </div>
                                    @endforeach
{{--                                    <div class="form-group">--}}
{{--                                        <label for="staff_name">Staff Name</label>--}}
{{--                                        <input type="text" class="form-control" id="staff_name" name="staff_name" aria-describedby="staff_name" value="{{old('staff_name') ?? $staff->staff_name}}">--}}
{{--                                    </div>--}}
                                    <button type="submit" class="btn btn-primary"><i class="far fa-save font-16"></i> Update</button>
                                </form>
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

@section('scripts-after')
    <script src="{{asset('assets/dropify-0.2.2/js/dropify.js')}}"></script>
    <script>
        $('.dropify').dropify({});
    </script>
@endsection
