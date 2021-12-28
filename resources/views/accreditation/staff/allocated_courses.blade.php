@extends('accreditation.staff.layouts.app',['page_title'=>'CS Course Allocation | Allocated Courses'])

@section('css-before')

@endsection

@section('css-after')
    <!-- Switchery css -->
    <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <!-- DataTables css -->
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <style>
        tr, td {
            color: black;
        }
        .vertical-center {
            margin: 0;
            /*position: absolute;*/
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
@endsection

@section('content')
    <!-- Start row -->
    <div class="row">
{{--        <div class="col-12">--}}
{{--            <button type="button" class="btn btn-round btn-outline-primary my-1" data-toggle="modal" data-target=".bd-example-modal-lg"><i class='far fa-plus'></i></button>--}}
{{--            --}}{{--            <a  href='".URL::signedRoute('staff.staff.show', ['staff'=>$row->id])."' class='d-inline justify-content-center align-items-center btn btn-round btn-outline-primary'><i class='far fa-eye' role='button'></i></a>--}}
{{--        </div>--}}
        <!-- Start col -->

        <div class="col-md-12 col-lg-12 col-xl-12">
            <input id="staff_name" type="hidden" value='@json($staff->staff_name)'>
            <input id="co_lecturers" type="hidden" value='@json($co_lecturers)'>
            <input id="course_code" type="hidden" value='@json($course->code)'>
            <input id="course_title" type="hidden" value='@json($course->title)'>
            <input id="academic_session" type="hidden" value='@json($academic_session->academic_session)'>

            <div class="row">
                <div class="container-fluid mb-2 mt-n3">
                <div class="col-12 h4 mb-2  alert alert-primary vertical-center">
                    {{$staff->staff_name}}
                @if(!is_null($co_lecturers))
{{--                    <div class="col-12 float mb-2">--}}
                        <span class="font-16 vertical-center">(with {{$co_lecturers}})</span>
{{--                    </div>--}}
                @endif
                </div>
                </div>
                <div class="col-12 h4 float mb-2">
                    <div style="float: left">
                        {{$course->code.": ".$course->title}}
                    </div>
                    <div style="float: right">
                        {{$academic_session->academic_session}}
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <div id="data-table_wrapper my-2"></div>
                <table class="table table-bordered table-striped data-table" style="width: 100%;">
                    <thead>
                    <tr style="color: black">
                        <th>#</th>
                        {{--                    <th></th>--}}
                        {{--                    <th>P100</th>--}}
                        <th>Reg. Number</th>
                        <th>JAMB Number</th>
                        <th>Name</th>
                        <th>Admission Set</th>
                        <th>Mode of Entry</th>
{{--                        <th style="width: 160px">Action</th>--}}
                    </tr>
                    </thead>
                    <tbody style="color: black">
                        @if(isset($students))
                            @foreach($students as $student)
                                <tr style="color: black">
                                    <td style="color: black">{{$loop->iteration}}</td>
                                    <td style="color: black">{{$student->regno}}</td>
                                    <td style="color: black">{{$student->jambno}}</td>
                                    <td style="color: black">{{$student->name}}</td>
                                    <td style="color: black">{{$student->admissionset}}</td>
                                    <td style="color: black">{{$student->modeofentry}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    @endsection

    @section('scripts-middle')
        <!-- Datatable js -->
            <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
            <script src="{{asset('assets/js/custom/custom-table-datatable.js')}}"></script>
        <script>
            // let table = $('.data-table').DataTable({});
            "use strict";
            let staff_name = $('#staff_name').val();
            let co_lecturers = $('#co_lecturers').val();
            let course_code = $('#course_code').val();
            let course_title = $('#course_title').val();
            let academic_session = $('#academic_session').val();
            // let title = academic_session +  ' Registered students for ' + course_code + ': ' + course_title;
            let title = "[" + academic_session + "] " + course_code + ': ' + course_title;
            title = title.replace(/"/g,"").replace("\\/", "/");
            let message_bottom = title;
            let message_top = title;
            let table = $('.data-table').DataTable({
                responsive: true,
                // dom: '<lf<t>ip>',
                // dom: 'Bfrtip',
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]],

                buttons:[
                    {
                        extend:"copy",
                        className:"btn  btn-primary btn-rounded mr-2",
                        text: "<i class='far fa-2x fa-clipboard'></i>",
                        // exportOptions: {
                        //     columns: ':not(:last-child)',
                        // },
                        messageBottom: message_bottom,
                        messageTop: message_top,
                        title: title,
                    },
                    {
                        extend:"csv",
                        className:"btn  btn-success btn-rounded mr-2",
                        text: "<i class='far fa-2x fa-file-csv'></i>",
                        // exportOptions: {
                        //     columns: ':not(:last-child)',
                        // },
                        messageBottom: message_bottom,
                        messageTop: message_top,
                        title: title,
                    },
                    {
                        extend:"print",
                        className:"btn  btn-primary btn-rounded mr-2",
                        text: "<i class='far fa-2x fa-print'></i>",
                        // exportOptions: {
                        //     columns: ':not(:last-child)',
                        // },
                        messageBottom: message_bottom,
                        messageTop: message_top,
                        title: title
                    },
                    {
                        extend:"excelHtml5",
                        className:"btn  btn-success btn-rounded mr-2",
                        text: "<i class='far fa-2x fa-file-excel'></i>",
                        // exportOptions: {
                        //     columns: ':not(:last-child)',
                        // },
                        messageBottom: message_bottom,
                        messageTop: message_top,
                        title: title
                    },
                    {
                        extend:"pdfHtml5",
                        className:"btn  btn-danger btn-rounded",
                        text: "<i class='far fa-2x fa-file-pdf'></i>",
                        // exportOptions: {
                        //     columns: ':not(:last-child)',
                        // },
                        messageBottom: message_bottom,
                        messageTop: message_top,
                        title: title,
                    },
                ],
                dom:"<'row'<'col-sm-12'<'text-center  py-0 mb-n4'B>>>" +
                    "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i>" +
                    "<'col-sm-12 col-md-7'p>>",
                "createdRow": function( row, data, dataIndex){
                    if( data.deleted_at !=  null){
                        $(row).addClass('bg-warning-light');
                    }else{
                        $(row).addClass('bg-success-light');
                    }
                }

            });
            // table.buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');
        </script>

{{--            <script type="text/javascript">--}}

{{--                $(function () {--}}
{{--                    let table = $('.data-table').DataTable({--}}
{{--                        processing: true,--}}
{{--                        serverSide: true,--}}
{{--                        ajax: "{{ route('staff.allocate-courses.staff.show', []) }}",--}}
{{--                        columns: [--}}
{{--                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},--}}
{{--                            // {data: 'staff_photo', name: 'staff_photo'},--}}
{{--                            // {data: 'thumbnail', name: 'thumbnail', orderable: false, searchable: false},--}}
{{--                            // {data: 'staff_number', name: 'staff_number'},--}}
{{--                            {data: 'regno', name: 'regno'},--}}
{{--                            {data: 'jambno', name: 'jambno'},--}}
{{--                            {data: 'name', name: 'name'},--}}
{{--                            {data: 'admissionset', name: 'admissionset'},--}}
{{--                            {data: 'modeofentry', name: 'modeofentry'},--}}
{{--                            // {data: 'registered_students', name: 'registered_students'},--}}
{{--                            // {data: 'academic_session', name: 'academic_session'},--}}
{{--                            // {data: 'lecturers', name: 'lecturers'},--}}
{{--                            {data: 'action', name: 'action', orderable: false, searchable: false},--}}
{{--                        ],--}}

{{--                        columnDefs: [ {--}}
{{--                            targets: "_all",--}}
{{--                            createdCell: function (td, cellData, rowData, row, col) {--}}
{{--                                // if ( rowData[5] === 'Inactive' ) {--}}
{{--                                $(td).css('color', 'black');--}}
{{--                                // }--}}
{{--                            }--}}
{{--                        } ],--}}

{{--                        // "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],--}}
{{--                        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]],--}}
{{--                    });--}}
{{--                });--}}
{{--            </script>--}}
@endsection
