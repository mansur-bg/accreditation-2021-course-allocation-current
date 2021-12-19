@extends('accreditation.staff.layouts.app',['page_title'=>'CS Course Allocation | '.$staff->staff_name])

@section('css-before')
@endsection

@section('css-after')
    <style>
        table {
            border-collapse:separate;
            border-spacing: 0 .5em;
        }
    </style>
@endsection

@section('content')
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-12 mb-1 mt-0" style="text-align: left">
                <a class="btn btn btn-primary" href="{{route('staff.staff.index')}}"><i class="far fa-arrow-alt-left"></i> Staff Index</a>
        </div>
        <div class="col-12">
            <!-- Start col -->
            <div class="col-md-12">
                <div class="card m-b-30">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('assets/photos/staff/'.$staff->photo)}}" style="height: 400px; width: 100%" class="card-img" alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title font-18">{{$staff->staff_name}}</h5>
                                <table>
                                    <tbody>
                                    @foreach($controls as $label => $value)
                                        <tr>
                                            <td style="text-align: right; font-weight: bold; padding-right: 10px;">{{$label}}: </td>
                                            <td>{{$value}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
{{--                                    <tr>--}}
{{--                                        <td style="text-align: right; font-weight: bold">Specialisation:</td>--}}
{{--                                        <td>{{$staff->specialisation}}</td>--}}
{{--                                    </tr>--}}
                                </table>
{{--                                <div class="form-group row">--}}
{{--                                    <label for="staff_number" class="col-sm-4 col-form-label text-right my-n2">Staff Number</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="form-control my-n2" id="staff_number"> {{$staff->staff_number}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label for="title" class="col-sm-4 col-form-label text-right my-n2">Title</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="my-n2 align-middle" id="title"> {{$staff->title}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label for="name" class="col-sm-4 col-form-label text-right my-n2">Name</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="form-control my-n2" id="name"> {{$staff->name}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group row">--}}
{{--                                    <label for="rank" class="col-sm-4 col-form-label text-right my-n2">Rank</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="form-control my-n2" id="rank"> {{$staff->rank}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group row">--}}
{{--                                    <label for="phone_number" class="col-sm-4 col-form-label text-right my-n2">Phone Number</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="form-control my-n2" id="name"> {{$staff->phone_number}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group row">--}}
{{--                                    <label for="email" class="col-sm-4 col-form-label text-right my-n2">Email</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="form-control my-n2" id="email"> {{$staff->email}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group row">--}}
{{--                                    <label for="status" class="col-sm-4 col-form-label text-right my-n2">Status</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="form-control my-n2" id="email"> {{$staff->status}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group row">--}}
{{--                                    <label for="qualifications" class="col-sm-4 col-form-label text-right my-n2">Qualifications</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="form-control my-n2" id="email"> {{$staff->qualifications}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group row">--}}
{{--                                    <label for="specialisation" class="col-sm-4 col-form-label text-right my-n2">Specialisation</label>--}}
{{--                                    <div class="col-sm-8">--}}
{{--                                        <p type="text" class="form-control my-n2" id="email"> {{$staff->specialisation}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <a type="submit" href="{{URL::signedRoute('staff.staff.edit', ['staff'=>$staff->id])}}" class="btn btn-primary" role="button"><i class="far fa-edit font-16"></i> Edit</a>
{{--                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
{{--                                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
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

@section('scripts-middle')
@endsection
